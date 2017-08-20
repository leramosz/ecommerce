<?
require_once MODEL_DIR."/purchase.php";

class Purchase extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->Purchase = new PurchaseModel();
	}

	public function index(){

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