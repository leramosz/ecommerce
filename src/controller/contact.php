<?

class Contact extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function index(){

		return $this->view->render("contact.html");
	}
	
}

?>