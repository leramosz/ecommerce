<?
require_once MODEL_DIR."/login.php";
require_once MODEL_DIR."/wishlist.php";

class Login extends Controller {
	
	/* It instances model classes */
	function __construct() {
		parent::__construct();
		$this->Login = new LoginModel();
		$this->Login->Wishlist = new WishlistModel();
	}

	/* It shows the login page */
	public function index($params = false) {
		return $this->view->render('login.html');
	}

	/* It shows the register page */
	public function register($params = false){
		return $this->view->render('register.html');
	}

	/* It register a new user  */
	public function do_register($params = false){

		// checking is the user exists and returning to the ajax call
		// the proper message
		$user = $this->Login->user($params['username']);
		if ($user) { 
			echo "User already taken";
			exit(0);
		}

		// registering a new user
		if($this->Login->register($params)) {
			echo "OK";
			exit(0);
		}

		// returnig an error message in case of any problem creating a new user
		echo "KO";
		exit(0);
	}

	/* It logs in a user into the app */
	public function login($params = false){

		// checking if the user is valid
		$user = $this->Login->login($params['username'], $params['password']);
		if($user) {
			$this->session->set('session-user', $user);
			//init favourites values
			$wishlist = $this->Login->Wishlist->getWishlist($user['id']);
			array_walk($wishlist, function(&$item) { $item = $item['id']; });
			$this->session->set('session-fav-books', $wishlist);
			echo "OK";
		} else { // if the user is not valid, send an error message
			echo "KO";
		}
		exit(0);

	}

	/* It logs out a user from the app */
	public function logout(){
		$this->session->destroy();
		exit(0);
	}
}

?>