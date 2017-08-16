<?

class Controller {

	private $content;
	
	function __construct() {

		$this->model = new Model();
		$this->view = new View();

		$this->params = array();
		$this->params['action'] = "index";
		foreach ($_REQUEST as $k => $v) {
			
			if ($k == 'controller') {
				$this->controller = $v;
				continue;
			}

			$this->params[$k] = $v;
		}	

	}

	public function index(){

		$slider_books = $this->model->getSliderBooks();
		$new_books = $this->model->getNewBooks();
		$best_sellers = $this->model->getBestSellers();
		$featured_authors = $this->model->getFeaturedAuthors();

		$this->view->assign('slider_books', $slider_books);
		$this->view->assign('new_books', $new_books);
		$this->view->assign('best_sellers', $best_sellers);
		$this->view->assign('featured_authors', $featured_authors);
		$this->content = $this->view->render("home.html");

	}

	public function books(){

		if(isset($this->params['book_id'])) {

			$book = $this->model->getBook($this->params['book_id']);
			if ($book) {
				$this->view->assign('book', $book);
				$this->content = $this->view->render("book.html");
			} else {
				$this->view->assign('page', 'books');
				$this->error();
				return;
			}

		} else {

			$book_genres = $this->model->getGenres();

			if (isset($this->params['genre_id'])) {
				$books = $this->model->getBooks($this->params['genre_id']);
				if ($books) {
					$selected_genre = $this->model->getGenres($this->params['genre_id'])[0];
					$this->view->assign('selected_genre', $selected_genre);
				} else {
					$this->view->assign('page', 'books');
					$this->error();
					return;
				}
			} else {
				$books = $this->model->getBooks();
			}

			$this->view->assign('book_genres', $book_genres);
			$this->view->assign('books', $books);
			$this->content = $this->view->render("books.html");

		}
	}

	public function authors(){

		if(isset($this->params['author_id'])) {
			$author = $this->model->getAuthors($this->params['author_id']);
			if ($author) {
				$this->view->assign('author', $author);
				$this->content = $this->view->render("author.html");
			} else {
				$this->view->assign('page', 'authors');
				$this->error();
				return;
			}
		} else {
			$this->content = $this->view->render("authors.html");
		}
	}

	public function cart(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("cart.html");

	}

	public function checkout(){

		$this->content = $this->view->render("checkout.html");
	}

	public function contact(){

		$this->content = $this->view->render("contact.html");

	}

	public function wishlist(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("wishlist.html");

	}

	public function error(){
		
		$this->content = $this->view->render("error.html");

	}

	public function end(){

		$this->view->assign('content', $this->content);
		echo $this->view->display("base.html");
		
	}

}

?>