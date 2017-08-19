<?
require_once MODEL_DIR."/login.php";
require_once MODEL_DIR."/wishlist.php";

class Login extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->Login = new LoginModel();
		$this->Login->Wishlist = new WishlistModel();
	}

	public function index($params = false) {
		return $this->view->render('login.html');
	}

	public function register($params = false){
		return $this->view->render('register.html');
	}

	public function do_register($params = false){

		$user = $this->Login->user($params['username']);
		if ($user) {
			echo "User already taken";
			exit(0);
		}

		if($this->Login->register($params)) {
			echo "OK";
			exit(0);
		}

		echo "There was a problem";
		exit(0);
	}

	public function login($params = false){

		$user = $this->Login->login($params['username'], $params['password']);
		if($user) {
			$this->session->set('session-user', $user);
			//init favourites values
			$wishlist = $this->Login->Wishlist->getWishlist($user['id']);
			array_walk($wishlist, function(&$item) { $item = $item['id']; });
			$this->session->set('session-fav-books', $wishlist);
			echo "OK";
		} else {
			echo "KO";
		}
		exit(0);

	}

	public function logout(){
		$this->session->destroy();
		exit(0);
	}
}

?>