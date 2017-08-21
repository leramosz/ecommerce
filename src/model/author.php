<?

class AuthorModel extends Model {
	
	function __construct(){
		parent::__construct();
	}

	/* It gets all authors making use of the Database class and return the data to the controller */
	public function getAuthors($genre_id = false) {

		$authors = array();

		$this->db->selectTable('author');
		$this->db->select(array('id', 'name', 'biography', 'image'));

		// getting authors filtered by genre_id if needed
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

	/* It gets an author making use of the Database class and returns the data to the controller */
	function getAuthor($author_id = false) {

		$author = array();

		$this->db->selectTable('author');
		$this->db->select('*')
					->where(array('id' => $author_id));
		
		$author = $this->db->query();

		// if the author exists, getting respective books 
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
}

?>