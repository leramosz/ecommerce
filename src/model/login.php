<?

class LoginModel extends Model {
	
	function __construct(){
		parent::__construct();
	}

	public function login($username, $password){

		$user = array();

		$this->db->selectTable('user');
		$this->db->select(array('id', 'name', 'mail'))
					->where(array('username' => $username))->and(array('password' => $password));

		$user = $this->db->query();

		return $user[0];

	}

	public function register($fields) {
		return $this->db->insert('user', $fields);
	}

	public function user($username) {

		$user = array();

		$this->db->selectTable('user');
		$this->db->select(array('name'))->where(array('username' => $username));

		$user = $this->db->query();

		return $user;

	}

}

?>