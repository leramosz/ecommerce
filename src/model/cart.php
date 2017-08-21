<?

class CartModel extends Model {
	
	function __construct(){
		parent::__construct();
	}

	/* It gets books to be shown in the cart page making use the Database class */
	/* and returns the data to the controller 									*/
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