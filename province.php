<?php
/**
 *
 */
class Province {

    // database connection and table name
    private $conn;
    private $table_name = "province";

    // default constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // read all records
    function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY province_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}

?>
