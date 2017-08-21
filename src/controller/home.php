<?

require_once MODEL_DIR."/home.php";

class Home extends Controller {

	/* It instances model classes */
	function __construct() {
		parent::__construct();
		$this->Home = new HomeModel();
	}

	/* It gathers the data to be shown in the home page and passes to the view */
	public function index($params = false) {

		$slider_books = $this->Home->getSliderBooks();
		$new_books = $this->Home->getNewBooks();
		$best_sellers = $this->Home->getBestSellers();
		$featured_authors = $this->Home->getFeaturedAuthors();

		// checking if user exists so cart / wishlist options to be shown
		if($this->session->exists('session-user')) {
			$this->view->assign('user', $this->session->get('session-user')['id']);
		}
		
		$this->view->assign('slider_books', $slider_books);
		$this->view->assign('new_books', $new_books);
		$this->view->assign('best_sellers', $best_sellers);
		$this->view->assign('featured_authors', $featured_authors);
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
		return $this->view->render("home.html");	

	}
	
}

?>