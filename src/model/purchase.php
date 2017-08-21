<?

class PurchaseModel extends Model {
	
	function __construct(){
		parent::__construct();
	}

	/* It creates a new purchase order making use of the Database class and returns */
	/* the data to the controller */
	public function create($user, $cart, $total) {

		$purchase_id = uniqid("ORDER-");

		$fields = array("id" => $purchase_id, "total" => $total);
		$this->db->insert('purchase', $fields);	

		// saving every book from the cart
		foreach($cart as $book_id => $values) {

			$fields = array(
								"purchase_id" => $purchase_id, 
								"user_id" => $user['id'], 
								"book_id" => $book_id,
								"quantity" => $values['count'],
								"subtotal" => $values['amount'],
							);

			$this->db->insert('purchase_detail', $fields);
		}

		return $purchase_id;

	}

	/* It gets an user's purchase list making use of the Database class and returns */
	/* the data to the controller */
	public function getPurchases($user_id) {

		$purchases = array();

		$this->db->selectTable('purchase');
		$this->db->select(array('id', 'total', 'time'));

		$this->db->joinTable('purchase_detail');
		$this->db->join(array("id" => "purchase_id"));

		$this->db->selectTable('purchase_detail');
		$this->db->joinTable('user');
		$this->db->join(array("user_id" => "id"))
					->where(array('id' => $user_id), "user")->group_by("purchase.id");

		$purchases = $this->db->query();	

		// getting the books that belongs to the purchase order
		foreach ($purchases as &$purchase) {
			
			$this->db->selectTable('purchase_detail');
			$this->db->select(array('book_id', 'quantity', 'subtotal'));

			$this->db->joinTable('purchase');
			$this->db->join(array("purchase_id" => "id"))
						->where(array('id' => $purchase['id']), "purchase");

			$purchase['purchase-detail'] = $this->db->query();	

			// getting additional book information
			foreach ($purchase['purchase-detail'] as &$detail) {
				
				$this->db->selectTable('book');
				$this->db->select(array('name', 'image'))
							->where(array("id" => $detail['book_id']));


				$detail['book-detail'] = $this->db->query()[0];	

			}

		}
					
		return $purchases;	

	}
}

?>