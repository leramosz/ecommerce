<?

class GenreModel extends Model {

	function __construct(){
		parent::__construct();
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
	
}

?>