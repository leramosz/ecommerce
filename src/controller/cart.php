<?
require_once MODEL_DIR."/cart.php";
require_once MODEL_DIR."/purchase.php";

class Cart extends Controller {

	function __construct() {
		parent::__construct();
		$this->Cart = new CartModel();
		$this->Purchase = new PurchaseModel();
	}

	public function index($params = false) {

		if(!$this->session->exists('session-user')) {
			return $this->not_authorized();
		}

		$cart_books = $this->session->get('session-cart-books');
		if(count($cart_books) > 0) {
			$cart_books = $this->Cart->getCartBooks($cart_books);

		}
		$this->view->assign('total_amount', $this->session->get('cart-amount'));
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('cart_books', $cart_books);
		return $this->view->render("cart.html");
	
	}

	public function add($params = false) {

		$session_cart_books = $this->session->get('session-cart-books');
		$this->session->set('cart-amount', $params['cart_amount']);
		$this->session->set('cart-count', $params['cart_count']);

		if (!array_key_exists($params['book_id'], $session_cart_books)) {
			$session_cart_books[$params['book_id']] = array();
			$session_cart_books[$params['book_id']]['count'] = 1;
			$session_cart_books[$params['book_id']]['amount'] = $params['price'];
		} else {
			$session_cart_books[$params['book_id']]['count'] += 1;
			$session_cart_books[$params['book_id']]['amount'] += $params['price'];
		}

		$this->session->set('session-cart-books', $session_cart_books);
		
		echo "added";
		exit(0);
	}

	public function delete($params = false) {

		$session_cart_books = $this->session->get('session-cart-books');

		$amount_to_remove = $session_cart_books[$params['book_id']]['amount'];
		$count_to_remove = $session_cart_books[$params['book_id']]['count'];
	
		$new_amount = $this->session->get('cart-amount') - $amount_to_remove;
		$new_count = $this->session->get('cart-count') - $count_to_remove;

		$this->session->set('cart-amount', $new_amount);
		$this->session->set('cart-count', $new_count);

		unset($session_cart_books[$params['book_id']]);
		$this->session->set('session-cart-books', $session_cart_books);

		$res['new_amount'] = $new_amount;
		$res['new_count'] = $new_count;

		echo json_encode($res);
		exit(0);

	}

	public function delete_cart_page($params = false){

		$session_cart_books = $this->session->get('session-cart-books');
		$this->session->set('cart-amount', $params['cart_amount']);
		$this->session->set('cart-count', $params['cart_count']);

		$session_cart_books[$params['book_id']]['count'] -= $params['count'];
		
		if ($session_cart_books[$params['book_id']]['count'] == 0) {
			unset($session_cart_books[$params['book_id']]);
		} else {
			$session_cart_books[$params['book_id']]['amount'] -= $params['price'];
		}
		
		$this->session->set('session-cart-books', $session_cart_books);

		echo "removed";
		exit(0);
	}

	public function checkout($params = false){

		$user = $this->session->get('session-user');
		$cart = $this->session->get('session-cart-books');
		$total = $this->session->get('cart-amount');
		
		$purchase_id = $this->Purchase->create($user, $cart, $total);

		$this->session->set('cart-amount', '0.00');
		$this->session->set('cart-count', '0');
		$this->session->set('session-cart-books', array());

		$this->view->assign('purchase_id', $purchase_id);
		echo $this->view->render("checkout.html");

		exit(0);


	}
	
}

?>