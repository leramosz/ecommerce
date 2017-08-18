<?

class Model {

	function __construct() {

		$this->db = new Database();
		
	}

	public function getSliderBooks() {

		$slider_books = array();

		$this->db->selectTable('book');
		$this->db->select(array('id', 'name', 'overview', 'price', 'image'))
					->where(array('highlighted' => 1));

		$slider_books = $this->db->query();

		return $slider_books;
	}

	public function getNewBooks(){

		$new_books = array();



		$this->db->selectTable('book');
		$this->db->select(array('id', 'name', 'price', 'sale_off', 'hot', 'rating', 'image'))
					->where(array('new' => 1));

		$new_books = $this->db->query();

		$this->db->selectTable('author');
		$this->db->joinTable('book');

		foreach($new_books as &$new_book) {

			$this->db->select(array('id', 'name'))->join(array('id' => 'author_id'))
						->where(array('id' => $new_book['id']), "book");

			$new_book['author'] = $this->db->query()[0];
		
		}

		return $new_books;

	}

	public function getBestSellers(){

		$best_sellers = array();

		$this->db->selectTable('book');
		$this->db->select(array('id', 'name', 'price', 'sale_off', 'hot', 'rating', 'image'))
					->where(array('best_seller' => 1));

		$best_sellers = $this->db->query();

		$this->db->selectTable('author');
		$this->db->joinTable('book');

		foreach($best_sellers as &$best_seller) {

			$this->db->select(array('id', 'name'))->join(array('id' => 'author_id'))
						->where(array('id' => $best_seller['id']), "book");

			$best_seller['author'] = $this->db->query()[0];
		
		}

		return $best_sellers;

	}

	public function getFeaturedAuthors() {

		$authors = array();

		$this->db->selectTable('author');
		$this->db->select('*')->where(array('featured' => 1));

		$authors = $this->db->query();

		return $authors;

	}

	public function getBook($book_id) {

		$book = array();

		$this->db->selectTable('book');
		$this->db->select('*')
					->where(array('id' => $book_id));

		$book = $this->db->query();

		if (isset($book[0])) {

			// getting book's author
			$this->db->selectTable('author');
			$this->db->joinTable('book');
			$this->db->select(array('id', 'name'))->join(array('id' => 'author_id'))
					->where(array('id' => $book_id), "book");

			$book[0]['author'] = $this->db->query()[0];

			// getting related books
			$this->db->selectTable('book');
			$this->db->joinTable('book_related');
			$this->db->select(array('id', 'name', 'overview', 'price', 'hot', 'sale_off', 'rating', 'image'))
						->join(array('id' => 'book_related_id'));

			$this->db->selectTable('book_related');
			$this->db->joinTable('book', 'b');
			$this->db->join(array('book_id' => 'id'))
						->where(array('id' => $book_id), 'b');

			$book[0]['related_books'] = $this->db->query();

			if ($book[0]['related_books']) {

				$this->db->selectTable('author');
				$this->db->joinTable('book');

				foreach($book[0]['related_books'] as &$related_book) {

					$this->db->select(array('id', 'name'))->join(array('id' => 'author_id'))
								->where(array('id' => $related_book['id']), "book");

					$related_book['author'] = $this->db->query()[0];
					
				}

			}

			return $book[0];

		}

		return false;

	}

	function getAuthor($author_id = false) {

		$author = array();

		$this->db->selectTable('author');
		$this->db->select('*');

		if ($author_id) {
			$this->db->where(array('id' => $author_id));
		}

		$author = $this->db->query();

		if (isset($author[0])) {

			$this->db->selectTable('book');
			$this->db->joinTable('author');
			$this->db->select(array('id', 'name', 'price', 'overview', 'sale_off', 'hot', 'rating', 'image'))->join(array('author_id' => 'id'))
					->where(array('id' => $author_id), "author");

			$author[0]['books'] = $this->db->query();

			return $author[0];

		}

		return false;

	}

	public function getGenres($genre_id = false) {

		$genres = array();

		$this->db->selectTable('genre');
		$this->db->select('*');

		if ($genre_id) {
			$this->db->where(array("id" => $genre_id));
		}

		$genres = $this->db->query();

		return $genres;
	}

	public function getBooks($genre_id = false) {

		$books = array();

		$this->db->selectTable('book');
		$this->db->select(array('id', 'name', 'price', 'overview', 'sale_off', 'hot', 'rating', 'image'));

		if ($genre_id) {
			$this->db->joinTable('book_genre');
			$this->db->join(array("id" => "book_id"))
						->where(array('genre_id' => $genre_id), "book_genre");
		}

		$books = $this->db->query();

		if ($books) {

			$this->db->selectTable('author');
			$this->db->joinTable('book');

			foreach($books as &$book) {

				$this->db->select(array('id', 'name'))->join(array('id' => 'author_id'))
							->where(array('id' => $book['id']), "book");

				$book['author'] = $this->db->query()[0];
				
			}

			return $books;

		}
		return false;
	}

	public function getAuthors($genre_id = false) {

		$authors = array();

		$this->db->selectTable('author');
		$this->db->select(array('id', 'name', 'biography', 'image'));

		if ($genre_id) {

			$this->db->joinTable('book');
			$this->db->join(array("id" => "author_id"));

			$this->db->selectTable('book');
			$this->db->joinTable('book_genre');
			$this->db->join(array("id" => "book_id"));

			$this->db->	where(array('genre_id' => $genre_id), "book_genre");

		}

		$authors = $this->db->query();

		return $authors;
	}

	public function getWishlist() {

		$wishlist = array();

		$this->db->selectTable('book');
		$this->db->select(array('id', 'name', 'price', 'overview', 'sale_off', 'hot', 'rating', 'image'));

		$this->db->joinTable('wishlist');
		$this->db->join(array("id" => "book_id"));

		$this->db->selectTable('wishlist');
		$this->db->joinTable('user');
		$this->db->join(array("user_id" => "id"))->where(array('id' => USER), 'user');

		$wishlist = $this->db->query();

		return $wishlist;

	}

	public function addToFavourite($fields) {

		if ($this->db->insert('wishlist', $fields)) {
			return "Added to Favourite";
		} else {
			return "Error";
		}

	}

	public function removeFromFavourite($fields) {
		if ($this->db->delete('wishlist', $fields)) {
			return "Removed from Favourite";
		} else {
			return "Error";
		}
	}

	public function getCartBooks($books) {

		$cart_books = array();
		
		$books_id = array_keys($books);

		$this->db->selectTable('book');
		$this->db->select(array('id', 'name', 'price', 'sale_off', 'image'))
					->where(array('id' => $books_id));

		$cart_books = $this->db->query();

		return $cart_books;
	}

}

?>