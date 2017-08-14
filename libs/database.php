<?

class Database {

	private $link;
	private $sql;
	
	function __construct() {
		
		//connecting to the mysql database
		$this->link = new mysqli('localhost', 'leo', '3eM9FN5g7ubnS9IW', 'dpa');
		mysqli_set_charset( $this->link, 'utf8');
	
	}

	// public function columns() {

	// 	//Creating columns
	// 	$escaped_values = array_map(array($this->link, 'real_escape_string'), $this->info['columns']);
	// 	array_walk($escaped_values, function(&$item) { $item = $this->table.".".$item; });
	// 	$values  = implode(",", $escaped_values);

	// 	return $values;

	// }

	// public function select() {

	// 	$columns = $this->columns();
	// 	$this->sql = "SELECT ".$columns." FROM ".$this->table;
	// 	return $this;
	// }

	// public function where($condition, $table = false) {

	// 	$table = ($table) ? $table : $this->table;
	// 	list($key, $value) = each($condition);

	// 	$this->sql .= " WHERE ".$table.".".$key."_id = ".$value;
	// 	return $this;

	// }

	// public function and($condition, $table = false) {

	// 	$table = ($table) ? $table : $this->table;
	// 	list($key, $value) = each($condition);

	// 	$this->sql .= " AND ".$table.".".$key."_id = ".$value;
	// 	return $this;

	// }

	// public function join($parent, $child) {
		
	// 	$this->sql .= " INNER JOIN ".$parent['name']." ON ".$parent['name'].".".$parent['table']['key']." = ".$child["name"].".".$parent['table']['key'];
	// }

	// public function on($key) {
	// 	$this->sql .= " ON ".$this->table.".".$key." = ".$this->info['parents'][$key].".id";
	// }

	// public function sql(){
	// 	return $this->sql;
	// }

	// public function run() {

	// 	$output = array();

	// 	$result = $this->link->query($this->sql);
	// 	while($row = $result->fetch_assoc()) {
	// 		$output[] = $row;
 // 		}

 // 		return $output;

	// }

}

?>