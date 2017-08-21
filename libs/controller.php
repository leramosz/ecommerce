<?

class Controller {

	public $view;
	public $session;
	

	/* It instances view and session classes. Also, it invoke a method to initiliaze session variables */
	function __construct() {

		$this->view = new View();
		$this->session = new Session();

		// init different values
		$this->initSessionValues();

	}

	/* It instances view and session classes. Also, it invoke a method to initiliaze session variables */
	private function initSessionValues(){
		//init cart values
		if(!$this->session->exists('cart-amount')) $this->session->set('cart-amount', '0.00');
		if(!$this->session->exists('cart-count')) $this->session->set('cart-count', 0);
		if(!$this->session->exists('session-cart-books')) $this->session->set('session-cart-books', array());

		//init fav values
		if(!$this->session->exists('session-fav-books')) $this->session->set('session-fav-books', array());
	}

	/* It calls the view render method to display the error page */
	public function error(){
		return $this->view->render("error.html");
	}

	/* It calls the view render method to display the not authorized page */
	public function not_authorized(){
		return $this->view->render("not-authorized.html");
	}

	/* It calls the view display method to display the final page for the user */
	public function end($content){
		// checking if user has logged in 
		if($this->session->exists('session-user')) {
			$this->view->assign('session_user', $this->session->get('session-user'));
		}

		// assigning variables to the page
		$this->view->assign('cart_amount', $this->session->get('cart-amount'));
		$this->view->assign('cart_count', $this->session->get('cart-count'));
		$this->view->assign('content', $content);
		echo $this->view->display("base.html");
	}

}

?>