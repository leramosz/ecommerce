<?
require_once "__config.php";
require_once "libs/session.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/database.php";

class Application {

	/* It instaces the right controller. Also, it initializes the application parameter to be used by the */
	/* controller methods.									   											  */
	function __construct() {

		// init params array
		$this->params = array();
		$this->controller_name = (isset($_REQUEST['controller'])) ? $_REQUEST['controller']:"home";
		$this->action_name = (isset($_REQUEST['action'])) ? $_REQUEST['action']:"index";

		// setting params array
		foreach ($_REQUEST as $k => $v) {
			if ($k == 'controller' || $k == 'action') continue;
			$this->params[$k] = $v;
		}

		// checking and including the respective controller file
		if (file_exists(CONTROLLER_DIR.'/'.$this->controller_name.".php")) {
			require_once CONTROLLER_DIR.'/'.$this->controller_name.".php";
			// instacing respective controller
			$this->controller = new $this->controller_name;
		} else {
			throw new Exception('No controller file '.$this->controller_name.' present');
		}

	}

	/* It invokes the right controller method and passes the application parameters. Also, it calls the */
	/* method to finish the application displaying the final page for the usar.  						*/
	public function run() {
		// invoking the right controller method
		$content = $this->controller->{$this->action_name}($this->params);
		// ending the application
		$this->controller->end($content);
	}

}

?>