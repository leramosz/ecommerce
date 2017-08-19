<?

class View {

	public $vars = array();
	
	function __construct() {
		
	}

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

	public function assign($name, $value) {

        $this->vars[$name] = $value;

    }

    public function display($template_file) {

        return $this->render($template_file);
    
    }

}

?>