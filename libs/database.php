<?

class Database {

	private $link;
	private $sql;
	private $selectTable;
	private $joinTable;
	private $tableAliases = array();
	
	/* It connects to the DB */
	function __construct() {
		
		//connecting to the mysql database
		$this->link = new mysqli('localhost', 'leo', '3eM9FN5g7ubnS9IW', 'bookstore');
		mysqli_set_charset( $this->link, 'utf8');
	
	}

	/* It sets the table for the SELECT statement */
	public function selectTable($table, $alias = false) {
		$this->selectTable = $table;
		$this->tableAliases[$table] = $table;
		// checking if using a table alias
		if ($alias) {
			$this->selectTable .= " AS ".$alias;
			$this->tableAliases[$this->selectTable] = $alias;
		} 
	}

	/* It sets the table for the JOIN statement */
	public function joinTable($table, $alias = false) {
		$this->joinTable = $table;
		$this->tableAliases[$table] = $table;
		// checking if using a table alias
		if ($alias) {
			$this->joinTable .= " AS ".$alias;
			$this->tableAliases[$this->joinTable] = $alias;
		} 
	}	

	/* It creates the SELECT statement */
	public function select($columns) {
		$columns = (is_array($columns)) ? $this->columns($columns) : $columns;
		$this->sql = "SELECT ".$columns." FROM ".$this->selectTable;
		return $this;
	}

	/* It creates the JOIN statement */
	public function join($condition) {
		list($key, $value) = each($condition);
		$this->sql .= " INNER JOIN ".$this->joinTable." ON ".$this->tableAliases[$this->selectTable].".".$key." = ".$this->tableAliases[$this->joinTable].".".$value;
		return $this;
	}

	/* It creates the WHERE statement */
	public function where($condition, $table = false, $operator = "=") {
		$table = ($table) ? $table : $this->selectTable;
		list($key, $value) = each($condition);

		// checking if values are an array to user an IN operator
		if(is_array($value)) {
			$operator = "IN";
			$value = "(".implode(',', $value).")";
		} else {
			$value = "'".$value."'";
		}

		$this->sql .= " WHERE ".$table.".".$key." ".$operator." ".$value;
		return $this;
	}

	/* It creates the GROUP BY statement */
	public function group_by ($group) {
		$this->sql .= " GROUP BY ".$group;
		return $this;
	}

	/* It adds the AND operator the the WHERE statement */
	public function and_operator($condition, $table = false, $operator = "=") {

		$table = ($table) ? $table : $this->selectTable;
		list($key, $value) = each($condition);
	
		// checking if values are an array to user an IN operator
		if(is_array($value)) {
			$operator = "IN";
			$value = "(".implode(',', $value).")";
		}

		$this->sql .= " AND ".$table.".".$key." ".$operator." '".$value."'";
		return $this;

	}

	/* It creates the INSERT statement */
	public function insert($table, $fields){

		// escaping insert values
		$columns = implode(",",array_keys($fields));
		$escaped_values = array_map(array($this->link, 'real_escape_string'), array_values($fields));
		array_walk($escaped_values, function(&$item) { $item = "'".$item."'"; });
		$values  = implode(",", $escaped_values);
		
		$this->sql = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
		return $this->link->query($this->sql);

	}

	/* It creates the DELETE statement */
	public function delete($table, $fields) {

		$this->sql = "DELETE FROM ".$table." WHERE ";

		// creating the DELETE condition, adding the AND operators in between
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

	/* It executes the QUERY and return results */
	public function query() {

		$output = array();

		$result = $this->link->query($this->sql);

		while($row = $result->fetch_assoc()) {
			$output[] = $row;
 		}

 		$this->sql = '';

 		return $output;

	}

	/* It escapes values for SELECT statement */
	public function columns($columns) {

		//Creating columns
		$escaped_values = array_map(array($this->link, 'real_escape_string'), $columns);
		array_walk($escaped_values, function(&$item) { $item = $this->selectTable.".".$item; });
		$columns  = implode(",", $escaped_values);

		return $columns;

	}

}

?>