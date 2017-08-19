<?

class HomeModel extends Model {

	function __construct(){
		parent::__construct();
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

}

?>