<?
require_once MODEL_DIR."/wishlist.php";

class Wishlist extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->Wishlist = new WishlistModel();
	}

	public function index($params = false) {

		if(!$this->session->exists('session-user')) {
			return $this->not_authorized();
		}

		$user = $this->session->get('session-user');
		$books = $this->Wishlist->getWishlist($user['id']);
		$this->view->assign('books', $books);
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('user', $user['id']);
		return $this->view->render("wishlist.html");
	}

	public function add($params = false) {
		$fav_books = $this->session->get('session-fav-books');
		$fav_books[] = $params['fields']['book_id'];
		$this->session->set('session-fav-books', $fav_books);
		echo $this->Wishlist->addToWishlist($params['fields']);
		exit(0);
	}

	public function delete($params = false) {
		$fav_books = $this->session->get('session-fav-books');
		if(($key = array_search($params['fields']['book_id'], $fav_books)) !== false) {
    		unset($fav_books[$key]);
		}
		$this->session->set('session-fav-books', $fav_books);
		echo $this->Wishlist->removeFromWishlist($params['fields']);
		exit(0);
	}

}

?>