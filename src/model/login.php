<?

class LoginModel extends Model {
	
	function __construct(){
		parent::__construct();
	}

	/* It gets the user after login making use of the Database class and returns */
	/* the data to the controller */
	public function login($username, $password){

		$user = array();

		$this->db->selectTable('user');
		$this->db->select(array('id', 'name', 'mail'))
					->where(array('username' => $username))->and_operator(array('password' => $password));

		$user = $this->db->query();

		return $user[0];

	}

	/* It register a new user making use of the Database class and returns the data to */
	/* the controller */
	public function register($fields) {
		return $this->db->insert('user', $fields);
	}

	/* It gets a user making use of the Database class and returns the data to the */
	/* controller */
	public function user($username) {

		$user = array();

		$this->db->selectTable('user');
		$this->db->select(array('name'))->where(array('username' => $username));

		$user = $this->db->query();

		return $user;

	}

}

?>