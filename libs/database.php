<?

class Database {

	private $link;
	private $sql;
	private $selectTable;
	private $joinTable;
	private $tableAliases = array();
	
	function __construct() {
		
		//connecting to the mysql database
		$this->link = new mysqli('localhost', 'leo', '3eM9FN5g7ubnS9IW', 'bookstore');
		mysqli_set_charset( $this->link, 'utf8');
	
	}

	public function selectTable($table, $alias = false) {
		$this->selectTable = $table;
		$this->tableAliases[$table] = $table;
		if ($alias) {
			$this->selectTable .= " AS ".$alias;
			$this->tableAliases[$this->selectTable] = $alias;
		} 
	}

	public function joinTable($table, $alias = false) {
		$this->joinTable = $table;
		$this->tableAliases[$table] = $table;
		if ($alias) {
			$this->joinTable .= " AS ".$alias;
			$this->tableAliases[$this->joinTable] = $alias;
		} 
	}	

	public function select($columns) {

		$columns = (is_array($columns)) ? $this->columns($columns) : $columns;
		$this->sql = "SELECT ".$columns." FROM ".$this->selectTable;
		return $this;
	}

	public function join($condition) {

		list($key, $value) = each($condition);
		$this->sql .= " INNER JOIN ".$this->joinTable." ON ".$this->tableAliases[$this->selectTable].".".$key." = ".$this->tableAliases[$this->joinTable].".".$value;
		return $this;
	}

	public function where($condition, $table = false, $operator = "=") {

		$table = ($table) ? $table : $this->selectTable;
		list($key, $value) = each($condition);

		if(is_array($value)) {
			$operator = "IN";
			$value = "(".implode(',', $value).")";
		} else {
			$value = "'".$value."'";
		}

		$this->sql .= " WHERE ".$table.".".$key." ".$operator." ".$value;
		return $this;

	}

	public function group_by ($group) {

		$this->sql .= " GROUP BY ".$group;
		return $this;

	}

	public function and_operator($condition, $table = false, $operator = "=") {

		$table = ($table) ? $table : $this->selectTable;
		list($key, $value) = each($condition);
	
		if(is_array($value)) {
			$operator = "IN";
			$value = "(".implode(',', $value).")";
		}

		$this->sql .= " AND ".$table.".".$key." ".$operator." '".$value."'";
		return $this;

	}

	public function insert($table, $fields){

		$columns = implode(",",array_keys($fields));
		$escaped_values = array_map(array($this->link, 'real_escape_string'), array_values($fields));
		array_walk($escaped_values, function(&$item) { $item = "'".$item."'"; });
		$values  = implode(",", $escaped_values);
		
		$this->sql = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
		return $this->link->query($this->sql);

	}

	public function delete($table, $fields) {

		$this->sql = "DELETE FROM ".$table." WHERE ";

		$condition = '';
		foreach($fields as $key => $value) {
			$condition .= $key." = ".$value;
			if (next($fields) !== false) {
				$condition .= " AND ";	
			}
		}

		$this->sql .= $condition;

		return $this->link->query($this->sql);
		
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