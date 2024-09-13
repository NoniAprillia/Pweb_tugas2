# TUGAS 2
## Menerapkan CRUD menggunakan PHP OOP

- ERD JURNAL :

![Screenshot (495)](https://github.com/user-attachments/assets/6f50a46b-3ff1-4314-ab2f-29631c91d2bf)

1. Membuat View berbasis OOP, dengan mengambil data dari database MySQL
   
```php
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
    public function fetchData($studentId = null) {
        if ($studentId) {
            $studentId = mysqli_real_escape_string($this->connect, $studentId);
            $query = "SELECT * FROM journals WHERE student_class_id = '$studentId'";
        } else {
            $query = "SELECT * FROM journals";
        }
        $result = $this->query($query);
        $array = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
}

class JournalDetails extends Database {
    public function fetchData() {
        $query = "SELECT * FROM journal_details";
        $result = $this->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
```

2. Menggunakan _construct sebagai link ke database

```php
public function __construct() {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        if (!$this->connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
```

3. Menerapkan enkapsulasi sesuai logika studi kasus

```php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "jurnal";
    protected $connect;
```

4. Membuat kelas turunan menggunakan konsep pewarisan

```php
class Journals extends Database {
    public function fetchData($studentId = null) {
        if ($studentId) {
            $studentId = mysqli_real_escape_string($this->connect, $studentId);
            $query = "SELECT * FROM journals WHERE student_class_id = '$studentId'";
        } else {
            $query = "SELECT * FROM journals";
        }
        $result = $this->query($query);
        $array = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
}

class JournalDetails extends Database {
    public function fetchData() {
        $query = "SELECT * FROM journal_details";
        $result = $this->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
```

5. Menerapkan polimorfisme untuk minimal 2 role sesuai studi kasus

```php
class Journals extends Database {
    public function fetchData($studentId = null) {
        if ($studentId) {
            $studentId = mysqli_real_escape_string($this->connect, $studentId);
            $query = "SELECT * FROM journals WHERE student_class_id = '$studentId'";
        } else {
            $query = "SELECT * FROM journals";
        }
        $result = $this->query($query);
        $array = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
}

class JournalDetails extends Database {
    public function fetchData() {
        $query = "SELECT * FROM journal_details";
        $result = $this->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
class StudentID extends Database {
    public function fetchData() {
        $query = "SELECT * FROM journal_details";
        $result = $this->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
```
