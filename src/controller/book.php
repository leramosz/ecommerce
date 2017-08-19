<?
require_once MODEL_DIR."/book.php";
require_once MODEL_DIR."/genre.php";

class Book extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->Book = new BookModel();
		$this->Book->Genre = new GenreModel();
	}

	public function index($params = false){

		$genres_list = $this->Book->Genre->getGenres();
		$books = $this->Book->getBooks();
		
		$this->view->assign('genres_list', $genres_list);
		$this->view->assign('books', $books);
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
		if($this->session->exists('session-user')) {
			$this->view->assign('user', $this->session->get('session-user')['id']);
		}
		return $this->view->render("books.html");

	}

	public function view($params = false){

		$book = $this->Book->getBook($params['book_id']);
		if ($book) {
			$this->view->assign('book', $book);
			$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
			$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
			if($this->session->exists('session-user')) {
				$this->view->assign('user', $this->session->get('session-user')['id']);
			}
			return $this->view->render("book.html");
		} else {
			$this->view->assign('page', 'books');
			return $this->error();
		}
	}

	public function by_genre($params = false){

		$genres_list = $this->Book->Genre->getGenres();
		$books = $this->Book->getBooks($params['genre_id']);
		if ($books) {
			$selected_genre = $this->Book->Genre->getGenres($params['genre_id'])[0];
			$this->view->assign('selected_genre', $selected_genre);
		} else {
			$this->view->assign('page', 'books');
			return $this->error();
		}

		$this->view->assign('genres_list', $genres_list);
		$this->view->assign('books', $books);
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
		if($this->session->exists('session-user')) {
			$this->view->assign('user', $this->session->get('session-user')['id']);
		}
		return $this->view->render("books.html");

	}
}

?>