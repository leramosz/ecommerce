<?

class Controller {

	public $view;
	public $session;
	
	function __construct() {

		$this->view = new View();
		$this->session = new Session();

		// init different values
		$this->initSessionValues();

	}

	private function initSessionValues(){
		//init cart values
		if(!$this->session->exists('cart-amount')) $this->session->set('cart-amount', '0.00');
		if(!$this->session->exists('cart-count')) $this->session->set('cart-count', 0);
		if(!$this->session->exists('session-cart-books')) $this->session->set('session-cart-books', array());

		//init fav values
		if(!$this->session->exists('session-fav-books')) $this->session->set('session-fav-books', array());
		
	}

	public function error(){
		return $this->view->render("error.html");
	}

	public function not_authorized(){
		return $this->view->render("not-authorized.html");
	}

	public function end($content){
		if($this->session->exists('session-user')) {
			$this->view->assign('session_user', $this->session->get('session-user'));
		}
		$this->view->assign('cart_amount', $this->session->get('cart-amount'));
		$this->view->assign('cart_count', $this->session->get('cart-count'));
		$this->view->assign('content', $content);
		echo $this->view->display("base.html");
	}

}

?>