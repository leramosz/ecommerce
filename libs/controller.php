<?

class Controller {
	
	function __construct() {

		$this->model = new Model();
		$this->view = new View();

		$this->params = array();
		$this->params['action'] = "index";
		foreach ($_REQUEST as $k => $v) {
			
			if ($k == 'controller') {
				$this->controller = $v;
				continue;
			}

			$this->params[$k] = $v;
		}	

	}

	public function index(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("home.html");

	}

	public function book(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("book.html");

	}

	public function author(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("author.html");

	}

	public function category(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("category.html");

	}

	public function cart(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("cart.html");

	}

	public function checkout(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("checkout.html");

	}

	public function contact(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("contact.html");

	}

	public function error(){

		//$this->view->assign('var', 'this a test');
		$this->content = $this->view->render("error.html");

	}

	public function end(){

		$this->view->assign('content', $this->content);
		echo $this->view->display("base.html");
		
	}

}

?>