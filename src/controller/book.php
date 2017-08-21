<?
require_once MODEL_DIR."/book.php";
require_once MODEL_DIR."/genre.php";

class Book extends Controller {
	
	/* It instances model classes */
	function __construct() {
		parent::__construct();
		$this->Book = new BookModel();
		$this->Book->Genre = new GenreModel();
	}

	/* It gathers the data to be shown in the books page and passes to the view */
	public function index($params = false){

		$genres_list = $this->Book->Genre->getGenres();
		$books = $this->Book->getBooks();
		
		$this->view->assign('genres_list', $genres_list);
		$this->view->assign('books', $books);
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));

		// checking if user exists so cart / wishlist options to be shown
		if($this->session->exists('session-user')) {
			$this->view->assign('user', $this->session->get('session-user')['id']);
		}

		return $this->view->render("books.html");

	}

	/* It gathers the data to be shown in the book page and passes to the view */
	public function view($params = false){

		$book = $this->Book->getBook($params['book_id']);
		if ($book) {  // if book exists, show the book page

			$this->view->assign('book', $book);
			$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
			$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));

			// checking if user exists so cart / wishlist options to be shown
			if($this->session->exists('session-user')) {
				$this->view->assign('user', $this->session->get('session-user')['id']);
			}

			return $this->view->render("book.html");

		} else { // otherwise, show the error page
			$this->view->assign('page', 'books');
			return $this->error();
		}
	}

	/* It gathers the data to be shown in the books page filter by genre and passes to the view */
	public function by_genre($params = false){

		$genres_list = $this->Book->Genre->getGenres();
		$books = $this->Book->getBooks($params['genre_id']);
		if ($books) { // if the genre has related books, show the book page

			$selected_genre = $this->Book->Genre->getGenres($params['genre_id'])[0];

			$this->view->assign('selected_genre', $selected_genre);
			$this->view->assign('genres_list', $genres_list);
			$this->view->assign('books', $books);
			$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
			$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));

			// checking if user exists so cart / wishlist options to be shown
			if($this->session->exists('session-user')) {
				$this->view->assign('user', $this->session->get('session-user')['id']);
			}

			return $this->view->render("books.html");

		} else {
			$this->view->assign('page', 'books');
			return $this->error();
		}

	}
}

?>