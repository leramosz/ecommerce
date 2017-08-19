<?

class BookModel extends Model {

	function __construct(){
		parent::__construct();
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
	
}

?>