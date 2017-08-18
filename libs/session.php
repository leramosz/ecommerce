<?

class Session {
	
	function __construct () {
		session_start();
	}

	public function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	public function get($key) {
		return $_SESSION[$key];
	}

	public function exists($key){
		if (isset($_SESSION[$key])) return true;
		return false;
	}

	public function destroy() {
		session_destroy();
	}
}

?>