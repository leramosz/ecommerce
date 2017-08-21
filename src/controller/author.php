<?
require_once MODEL_DIR."/author.php";
require_once MODEL_DIR."/genre.php";

class Author extends Controller {

	private $Author;
	
	/* It instances model classes */
	function __construct() {
		parent::__construct();
		$this->Author = new AuthorModel();
		$this->Author->Genre = new GenreModel();
	}

	/* It gathers the data to be shown in the authors page and passes to the view */
	public function index($params = false) {

		$genres_list = $this->Author->Genre->getGenres();
		$authors = $this->Author->getAuthors();
		
		$this->view->assign('authors', $authors);
		$this->view->assign('genres_list', $genres_list);
		return $this->view->render("authors.html");
	
	}

	/* It gathers the data to be shown in the author page and passes to the view */
	public function view($params = false) {

		$author = $this->Author->getAuthor($params['author_id']);
		if ($author) { // if author exists, show the author page

			$this->view->assign('author', $author);
			$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
			$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));

			// checking if user exists so cart / wishlist options to be shown
			if($this->session->exists('session-user')) {
				$this->view->assign('user', $this->session->get('session-user')['id']);
			}

			return $this->view->render("author.html");

		} else { // otherwise, show the error page
			$this->view->assign('page', 'authors');
			return $this->error();
		}
	}

	/* It gathers the data to be shown in the authors page filter by genre and passes to the view */
	public function by_genre($params = false) {

		$genres_list = $this->Author->Genre->getGenres();
		$authors = $this->Author->getAuthors($params['genre_id']);
		if ($authors) { // if the genre has related authors, show the authors page

			$selected_genre = $this->Author->Genre->getGenres($params['genre_id'])[0];

			$this->view->assign('selected_genre', $selected_genre);
			$this->view->assign('authors', $authors);
			$this->view->assign('genres_list', $genres_list);

			return $this->view->render("authors.html");
			
		} else { // otherwise, show the error page
			$this->view->assign('page', 'authors');
			return $this->error();
		}

	}
}

?>