<?

class Session {
	
	/* It initializes a session */
	function __construct () {
		session_start();
	}

	/* It addes a key / value to the session array */
	public function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	/* It returns a value according to the key from the session array */
	public function get($key) {
		return $_SESSION[$key];
	}

	/* It verifies if a key exists in the session array */
	public function exists($key){
		if (isset($_SESSION[$key])) return true;
		return false;
	}

	/* It destroys the session */
	public function destroy() {
		session_destroy();
	}
}

?>