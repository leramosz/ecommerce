<?

class Database {

	private $link;
	private $sql;
	private $selectTable;
	private $joinTable;
	
	function __construct() {
		
		//connecting to the mysql database
		$this->link = new mysqli('localhost', 'leo', '3eM9FN5g7ubnS9IW', 'bookstore');
		mysqli_set_charset( $this->link, 'utf8');
	
	}

	public function selectTable($table) {
		$this->selectTable = $table;
	}

	public function joinTable($table) {
		$this->joinTable = $table;
	}	

	public function select($columns) {

		$columns = (is_array($columns)) ? $this->columns($columns) : $columns;
		$this->sql = "SELECT ".$columns." FROM ".$this->selectTable;
		return $this;
	}

	public function join($condition) {

		list($key, $value) = each($condition);
		$this->sql .= " INNER JOIN ".$this->joinTable." ON ".$this->selectTable.".".$key." = ".$this->joinTable.".".$value;
		return $this;
	}

	public function where($condition, $table = false) {

		$table = ($table) ? $table : $this->selectTable;
		list($key, $value) = each($condition);
		$this->sql .= " WHERE ".$table.".".$key." = ".$value;
		return $this;

	}

	public function query() {

		$output = array();
		
		$result = $this->link->query($this->sql);
		while($row = $result->fetch_assoc()) {
			$output[] = $row;
 		}

 		$this->sql = '';

 		return $output;

	}

	public function columns($columns) {

		//Creating columns
		$escaped_values = array_map(array($this->link, 'real_escape_string'), $columns);
		array_walk($escaped_values, function(&$item) { $item = $this->selectTable.".".$item; });
		$columns  = implode(",", $escaped_values);

		return $columns;

	}

}

?>