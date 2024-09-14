<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "jurnal";
    protected $connect;

    public function __construct() {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        if (!$this->connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    protected function query($query) {
        $result = mysqli_query($this->connect, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($this->connect));
        }
        return $result;
    }
}

class Journals extends Database {
    public function fetchData($date = null) {
        $query = $date ? "SELECT * FROM journals WHERE DATE(created_at) = '$date'" : "SELECT * FROM journals";
        $result = $this->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

class JournalDetails extends Database {
    public function fetchData() {
        $query = "SELECT * FROM journal_details";
        $result = $this->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
class Student extends Database {
    public function fetchData(){
        $query = "SELECT * FROM journals WHERE student_class_id = 44 ";
        $result = $this->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>