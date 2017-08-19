<?
require_once "__config.php";
require_once "libs/session.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/database.php";

class Application {
	
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

		if (file_exists(CONTROLLER_DIR.'/'.$this->controller_name.".php")) {
			require_once CONTROLLER_DIR.'/'.$this->controller_name.".php";
			$this->controller = new $this->controller_name;
		} else {
			throw new Exception('No controller file '.$this->controller_name.' present');
		}

	}

	public function run() {
		$content = $this->controller->{$this->action_name}($this->params);
		$this->controller->end($content);
	}

}

?>