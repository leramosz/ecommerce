<?

class Controller {

	private $content;
	
	function __construct() {

		$this->model = new Model();
		$this->view = new View();
		$this->session = new Session();

		// init different values
		$this->init();

	}

	private function init(){

		// init params array
		$this->params = array();
		$this->params['action'] = "index";
		foreach ($_REQUEST as $k => $v) {
			
			if ($k == 'controller') {
				$this->controller = $v;
				continue;
			}

			$this->params[$k] = $v;
		}

		//init cart values
		if(!$this->session->exists('cart-amount')) $this->session->set('cart-amount', '0.00');
		if(!$this->session->exists('cart-count')) $this->session->set('cart-count', 0);
		if(!$this->session->exists('session-cart-books')) $this->session->set('session-cart-books', array());

		//init favourites values
		if(!$this->session->exists('session-fav-books')) {
			$wishlist = $this->model->getWishlist();
			array_walk($wishlist, function(&$item) { $item = $item['id']; });
			$this->session->set('session-fav-books', $wishlist);
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
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
		$this->content = $this->view->render("home.html");

	}

	public function books(){

		if(isset($this->params['book_id'])) {

			$book = $this->model->getBook($this->params['book_id']);
			if ($book) {
				$this->view->assign('book', $book);
				$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
				$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
				$this->content = $this->view->render("book.html");
			} else {
				$this->view->assign('page', 'books');
				$this->error();
				return;
			}

		} else {

			$genres_list = $this->model->getGenres();

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

			$this->view->assign('genres_list', $genres_list);
			$this->view->assign('books', $books);
			$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
			$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
			$this->content = $this->view->render("books.html");

		}
	}

	public function authors(){

		if(isset($this->params['author_id'])) {
			$author = $this->model->getAuthor($this->params['author_id']);
			if ($author) {
				$this->view->assign('author', $author);
				$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
				$this->view->assign('session_fav_books', $this->session->get('session-fav-books'));
				$this->content = $this->view->render("author.html");
			} else {
				$this->view->assign('page', 'authors');
				$this->error();
				return;
			}
		} else {

			$genres_list = $this->model->getGenres();

			if (isset($this->params['genre_id'])) {
				$authors = $this->model->getAuthors($this->params['genre_id']);
				if ($authors) {
					$selected_genre = $this->model->getGenres($this->params['genre_id'])[0];
					$this->view->assign('selected_genre', $selected_genre);
				} else {
					$this->view->assign('page', 'authors');
					$this->error();
					return;
				}
			} else {
				$authors = $this->model->getAuthors();
			}

			$this->view->assign('authors', $authors);
			$this->view->assign('genres_list', $genres_list);
			$this->content = $this->view->render("authors.html");
		}
	}

	public function cart(){

		$cart_books = $this->session->get('session-cart-books');
		if(count($cart_books) > 0) {
			$cart_books = $this->model->getCartBooks($cart_books);

		}
		$this->view->assign('total_amount', $this->session->get('cart-amount'));
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->view->assign('cart_books', $cart_books);
		$this->content = $this->view->render("cart.html");

	}

	public function wishlist(){

		$books = $this->model->getWishlist();
		$this->view->assign('books', $books);
		$this->view->assign('session_cart_books', $this->session->get('session-cart-books'));
		$this->content = $this->view->render("wishlist.html");

	}

	public function addToFavourite(){
		$fav_books = $this->session->get('session-fav-books');
		$fav_books[] = $this->params['fields']['book_id'];
		$this->session->set('session-fav-books', $fav_books);
		echo $this->model->addToFavourite($this->params['fields']);
		exit(0);
	}

	public function removeFromFavourite(){
		$fav_books = $this->session->get('session-fav-books');
		if(($key = array_search($this->params['fields']['book_id'], $fav_books)) !== false) {
    		unset($fav_books[$key]);
		}
		$this->session->set('session-fav-books', $fav_books);
		echo $this->model->removeFromFavourite($this->params['fields']);
		exit(0);
	}

	public function addToCart(){

		$session_cart_books = $this->session->get('session-cart-books');
		$this->session->set('cart-amount', $this->params['cart_amount']);
		$this->session->set('cart-count', $this->params['cart_count']);

		if (!array_key_exists($this->params['book_id'], $session_cart_books)) {
			$session_cart_books[$this->params['book_id']] = array();
			$session_cart_books[$this->params['book_id']]['count'] = 1;
			$session_cart_books[$this->params['book_id']]['amount'] = $this->params['price'];
		} else {
			$session_cart_books[$this->params['book_id']]['count'] += 1;
			$session_cart_books[$this->params['book_id']]['amount'] += $this->params['price'];
		}

		$this->session->set('session-cart-books', $session_cart_books);
		
		echo "added";
		exit(0);
	}

	public function removeFromCartPage(){

		$session_cart_books = $this->session->get('session-cart-books');
		$this->session->set('cart-amount', $this->params['cart_amount']);
		$this->session->set('cart-count', $this->params['cart_count']);

		$session_cart_books[$this->params['book_id']]['count'] -= $this->params['count'];
		
		if ($session_cart_books[$this->params['book_id']]['count'] == 0) {
			unset($session_cart_books[$this->params['book_id']]);
		} else {
			$session_cart_books[$this->params['book_id']]['amount'] -= $this->params['price'];
		}
		
		$this->session->set('session-cart-books', $session_cart_books);

		echo "removed";
		exit(0);
	}

	public function removeFromCart(){

		$session_cart_books = $this->session->get('session-cart-books');

		$amount_to_remove = $session_cart_books[$this->params['book_id']]['amount'];
		$count_to_remove = $session_cart_books[$this->params['book_id']]['count'];
	
		$new_amount = $this->session->get('cart-amount') - $amount_to_remove;
		$new_count = $this->session->get('cart-count') - $count_to_remove;

		$this->session->set('cart-amount', $new_amount);
		$this->session->set('cart-count', $new_count);

		unset($session_cart_books[$this->params['book_id']]);
		$this->session->set('session-cart-books', $session_cart_books);

		$res['new_amount'] = $new_amount;
		$res['new_count'] = $new_count;

		echo json_encode($res);
		exit(0);

	}

	public function error(){

		$this->content = $this->view->render("error.html");

	}

	public function checkout(){

		$this->content = $this->view->render("checkout.html");
	}

	public function contact(){

		$this->content = $this->view->render("contact.html");

	}

	public function end(){

		$this->view->assign('cart_amount', $this->session->get('cart-amount'));
		$this->view->assign('cart_count', $this->session->get('cart-count'));
		$this->view->assign('content', $this->content);
		echo $this->view->display("base.html");
		
	}

}

?>