<?

class WishlistModel extends Model {
	
	function __construct(){
		parent::__construct();
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