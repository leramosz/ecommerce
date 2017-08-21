<?
require_once MODEL_DIR."/wishlist.php";

class Wishlist extends Controller {
	
	/* It instances model classes */
	function __construct() {
		parent::__construct();
		$this->Wishlist = new WishlistModel();
	}

	/* It gathers the data to be shown in the wishlist page and passes to the view */
	public function index($params = false) {

		// checking if user doesn't exist so the not authorized page can be show
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

	/* It addes a book to the wishlist */
	public function add($params = false) {
		$fav_books = $this->session->get('session-fav-books');
		$fav_books[] = $params['fields']['book_id'];
		$this->session->set('session-fav-books', $fav_books);
		echo $this->Wishlist->addToWishlist($params['fields']);
		exit(0);
	}

	/* It removes a book from the wishlist */
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