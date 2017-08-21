<?

class View {

	public $vars = array();
	
	function __construct() {
		
	}

    /* It renders a template file. */
	public function render($template_file) {

		if (file_exists(TEMPLATE_DIR.'/'.$template_file)) {

            // using var names directly in the template
            foreach ($this->vars as $name => $value) {
                ${$name} = $value;
            }

            // starts buffering template file
            ob_start();
            include TEMPLATE_DIR.'/'.$template_file;
            $output = ob_get_clean();

            // cleaning vars
            $this->vars = array();
           
            return $output;

        } else {
            throw new Exception('No template file '.$template_file.' present in directory '.TEMPLATE_DIR);
        }

	}

    /* It creates a variable array to be passed to the template file. */
	public function assign($name, $value) {
        $this->vars[$name] = $value;
    }

    /* It creates a displays the final page for the user. */
    public function display($template_file) {
        return $this->render($template_file);
    }

}

?>