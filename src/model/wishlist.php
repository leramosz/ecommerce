<?

class WishlistModel extends Model {
	
	function __construct(){
		parent::__construct();
	}

	/* It gets an user's wishlist making use of the Database class and returns the data */
	/* to the controller */
	public function getWishlist($user_id) {

		$wishlist = array();

		$this->db->selectTable('book');
		$this->db->select(array('id', 'name', 'price', 'overview', 'sale_off', 'hot', 'rating', 'image'));

		$this->db->joinTable('wishlist');
		$this->db->join(array("id" => "book_id"));

		$this->db->selectTable('wishlist');
		$this->db->joinTable('user');
		$this->db->join(array("user_id" => "id"))->where(array('id' => $user_id), 'user');

		$wishlist = $this->db->query();

		return $wishlist;

	}

	/* It adds an book to a user's wishlist making use of the Database class and returns */
	/* the data to the controller */
	public function addToWishlist($fields) {
		if ($this->db->insert('wishlist', $fields)) {
			return "OK";
		} else {
			return "KO";
		}
	}

	/* It removes an book from a user's wishlist making use of the Database class and returns */
	/* the data to the controller */
	public function removeFromWishlist($fields) {
		if ($this->db->delete('wishlist', $fields)) {
			return "OK";
		} else {
			return "KO";
		}
	}
}

?>