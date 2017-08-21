<?
require_once MODEL_DIR."/purchase.php";

class Purchase extends Controller {
	
	/* It instances model classes */
	function __construct() {
		parent::__construct();
		$this->Purchase = new PurchaseModel();
	}

	/* It gathers the data to be shown in the purchase page and passes to the view */
	public function index(){

		// checking if user doesn't exist so the not authorized page can be show
		if(!$this->session->exists('session-user')) {
			return $this->not_authorized();
		}

		$user = $this->session->get('session-user');
		
		$purchases = $this->Purchase->getPurchases($user['id']);

		$this->view->assign('purchases', $purchases);
		return $this->view->render('purchases.html');
	}
}

?>