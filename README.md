# TUGAS 2
## Menerapkan CRUD menggunakan PHP OOP

## Tentang Saya

<pre>
Nama : Noni Aprillia Setyani
Kelas : TI 2B
Npm : 230102040
</pre>


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

- PENJELASAN :

Dalam konteks pemrograman berorientasi objek (OOP) di PHP, __construct() adalah metode khusus yang dikenal sebagai constructor. Ini adalah metode yang dipanggil secara otomatis saat objek dari suatu kelas dibuat atau diinstansiasi. __construct() biasanya digunakan untuk menginisialisasi properti atau menjalankan fungsi awal yang diperlukan untuk objek tersebut, termasuk menyambungkan ke database. Constructor digunakan untuk memberikan nilai awal atau melakukan inisialisasi.

Constructor sering kali digunakan untuk membuat koneksi ke database pada saat objek kelas database dibuat. 
Dengan menggunakan__construct(), kita bisa memastikan bahwa setiap kali instansiasi kelas database dilakukan, koneksi ke database juga akan otomatis terbentuk.
  
3. Menerapkan enkapsulasi sesuai logika studi kasus

```php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "jurnal";
    protected $connect;
```
Enkapsulasi adalah salah satu konsep dasar dalam pemrograman berorientasi objek (OOP). Tujuannya adalah untuk menyembunyikan detail internal suatu objek dari luar, dan memberikan cara yang aman untuk mengakses atau mengubah data. Dalam kasus ini, kita menggunakan akses private dan protected pada properti kelas.

Properti : 

- private adalah akses modifier yang hanya memungkinkan properti atau metode diakses di dalam kelas itu sendiri. Properti yang dideklarasikan dengan private tidak bisa diakses dari luar kelas, termasuk oleh kelas anak (subclass).

- protected memungkinkan properti atau metode untuk diakses oleh kelas itu sendiri dan oleh kelas turunannya (subclass), tetapi masih tidak bisa diakses dari luar kelas secara langsung.

- connect(): Metode ini adalah contoh dari cara kita menggunakan properti yang di-enkapsulasi untuk melakukan aksi tertentu, seperti membuat koneksi ke database.

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

Journals yang merupakan anak dari kelas Database.

JournalDetails yang juga merupakan anak dari kelas Database.

- 1. Kelas Induk (Database)
Kita berasumsi bahwa kelas Database menangani segala sesuatu yang berhubungan dengan koneksi dan eksekusi query database. Dengan konsep pewarisan, metode dan properti dalam kelas ini dapat digunakan oleh kelas Journals dan JournalDetails.

- 2. Kelas Anak (Journals)
Kelas ini mewarisi kelas Database, artinya kelas ini dapat menggunakan properti dan metode yang ada dalam kelas Database seperti $connect dan query() tanpa perlu mendefinisikannya ulang.

- 3. Kelas Anak (JournalDetails)
Seperti kelas Journals, kelas JournalDetails juga mewarisi properti dan metode dari kelas Database. 

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

pemrograman mengacu pada kemampuan objek untuk memiliki banyak bentuk atau cara yang berbeda dalam merespons panggilan fungsi yang sama. Dalam konteks kode PHP yang kamu berikan, polimorfisme ditunjukkan melalui pewarisan (inheritance), di mana kelas turunan seperti Journals, JournalDetails, dan StudentID mewarisi kelas induk Database, tetapi setiap kelas turunan memberikan implementasi metode fetchData() yang berbeda.

Polimorfisme memungkinkan objek dari kelas yang berbeda untuk diperlakukan sebagai objek dari kelas induk yang sama. Pada kode ini, semua kelas turunan (Journals, JournalDetails, dan StudentID) mewarisi dari kelas induk Database, dan masing-masing mengimplementasikan metode fetchData() sesuai kebutuhan.
