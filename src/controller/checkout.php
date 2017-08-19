<?

class Checkout extends Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index(){

		return $this->view->render("checkout.html");
	}
}

?>