<?

class Contact extends Controller {

	/* It instances model classes */
	function __construct() {
		parent::__construct();
	}

    /* It shows contact page */
	public function index(){
		return $this->view->render("contact.html");
	}
	
}

?>