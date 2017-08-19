<?

class Model {

	function __construct() {

		$this->db = new Database();
		
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

}

?>