<?
require_once MODEL_DIR."/cart.php";
require_once MODEL_DIR."/purchase.php";

class Cart extends Controller {

	/* It instances model classes */
	function __construct() {
		parent::__construct();
		$this->Cart = new CartModel();
		$this->Purchase = new PurchaseModel();
	}

	/* It gathers the data to be shown in the cart page and passes to the view */
	public function index($params = false) {

		// checking if user doesn't exist so the not authorized page can be show
		if(!$this->session->exists('session-user')) {
			return $this->not_authorized();
		}

		// determing is there are books in the cart to be listed
		$cart_books = $this->session->get('session-cart-books');
		if(count($cart_books) > 0) {
			$cart_books = $this->Cart->getCartBooks($cart_books);

		}

		$this->view->assign('total_amount', $this->session->get('cart-amount'));
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('cart_books', $cart_books);
		return $this->view->render("cart.html");
	
	}


	/* It addes a book to the cart */
	public function add($params = false) {

		$session_cart_books = $this->session->get('session-cart-books');
		$this->session->set('cart-amount', $params['cart_amount']);
		$this->session->set('cart-count', $params['cart_count']);

		// if the book isn't in the cart already, it's added
		if (!array_key_exists($params['book_id'], $session_cart_books)) {
			$session_cart_books[$params['book_id']] = array();
			$session_cart_books[$params['book_id']]['count'] = 1;
			$session_cart_books[$params['book_id']]['amount'] = $params['price'];
		} else { // otherwise, its count and amount are increased
			$session_cart_books[$params['book_id']]['count'] += 1;
			$session_cart_books[$params['book_id']]['amount'] += $params['price'];
		}

		$this->session->set('session-cart-books', $session_cart_books);
		
		// return the ajax call
		echo "added";
		exit(0);
	}

	/* It deletes a book completely from the cart when the action comes from the cart option */
	/* in book lists 																		 */
	public function delete($params = false) {

		$session_cart_books = $this->session->get('session-cart-books');

		$amount_to_remove = $session_cart_books[$params['book_id']]['amount'];
		$count_to_remove = $session_cart_books[$params['book_id']]['count'];
	
		// updating new values for the  session count and amount shown in the header
		$new_amount = $this->session->get('cart-amount') - $amount_to_remove;
		$new_count = $this->session->get('cart-count') - $count_to_remove;

		$this->session->set('cart-amount', $new_amount);
		$this->session->set('cart-count', $new_count);

		// removing the book from the session cart
		unset($session_cart_books[$params['book_id']]);
		$this->session->set('session-cart-books', $session_cart_books);

		// returning new acount and amount to the ajax call so they can be updated accordingly
		$res['new_amount'] = $new_amount;
		$res['new_count'] = $new_count;

		echo json_encode($res);
		exit(0);

	}

	/* It deletes a book from the cart when the action comes from the cart page */
	public function delete_cart_page($params = false){

		$session_cart_books = $this->session->get('session-cart-books');
		$this->session->set('cart-amount', $params['cart_amount']);
		$this->session->set('cart-count', $params['cart_count']);

		// decrease the count
		$session_cart_books[$params['book_id']]['count'] -= $params['count'];
		
		// delete the book from the session cart, when the count is 0
		if ($session_cart_books[$params['book_id']]['count'] == 0) {
			unset($session_cart_books[$params['book_id']]);
		} else { //otherwise, decrease the amount
			$session_cart_books[$params['book_id']]['amount'] -= $params['price'];
		}
		
		$this->session->set('session-cart-books', $session_cart_books);

		// return to the ajax call
		echo "removed";
		exit(0);
	}

	/* It create an order from the books in the cart and passes the result to the view*/
	public function checkout($params = false){

		$user = $this->session->get('session-user');
		$cart = $this->session->get('session-cart-books');
		$total = $this->session->get('cart-amount');
		
		$purchase_id = $this->Purchase->create($user, $cart, $total);

		// initializing cart session data
		$this->session->set('cart-amount', '0.00');
		$this->session->set('cart-count', '0');
		$this->session->set('session-cart-books', array());

		$this->view->assign('purchase_id', $purchase_id);

		// returning HTML to the ajax call so it can be added to the final page to be 
		// displayed for the user
		echo $this->view->render("checkout.html");
		exit(0);


	}
	
}

?>