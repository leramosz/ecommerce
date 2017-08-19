<?

class WishlistModel extends Model {
	
	function __construct(){
		parent::__construct();
	}

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

	public function addToWishlist($fields) {
		if ($this->db->insert('wishlist', $fields)) {
			return "Added to Wishlist";
		} else {
			return "Error";
		}
	}

	public function removeFromWishlist($fields) {
		if ($this->db->delete('wishlist', $fields)) {
			return "Removed from Wishlist";
		} else {
			return "Error";
		}
	}
}

?>