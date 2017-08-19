<?
require_once MODEL_DIR."/author.php";
require_once MODEL_DIR."/genre.php";

class Author extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->Author = new AuthorModel();
		$this->Author->Genre = new GenreModel();
	}

	public function index($params = false) {

		$genres_list = $this->Author->Genre->getGenres();
		$authors = $this->Author->getAuthors();
		
		$this->view->assign('authors', $authors);
		$this->view->assign('genres_list', $genres_list);
		return $this->view->render("authors.html");
	
	}

	public function view($params = false) {

		$author = $this->Author->getAuthor($params['author_id']);
		if ($author) {
			$this->view->assign('author', $author);
			$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
			$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
			return $this->view->render("author.html");
		} else {
			$this->view->assign('page', 'authors');
			return $this->error();
		}
	}

	public function by_genre($params = false) {

		$genres_list = $this->Author->Genre->getGenres();
		$authors = $this->Author->getAuthors($params['genre_id']);
		if ($authors) {
			$selected_genre = $this->Author->Genre->getGenres($params['genre_id'])[0];
			$this->view->assign('selected_genre', $selected_genre);
		} else {
			$this->view->assign('page', 'authors');
			return $this->error();
		}

		$this->view->assign('authors', $authors);
		$this->view->assign('genres_list', $genres_list);
		return $this->view->render("authors.html");
	}
}

?>