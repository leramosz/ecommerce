<?

class Checkout extends Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index(){

		if(!$this->session->exists('session-user')) {
			return $this->not_authorized();
		}

		return $this->view->render("checkout.html");
	}
}

?>