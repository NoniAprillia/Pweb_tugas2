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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7ie5Ni8DgRhc5LU5uA8QXxT+AmXD8O5xBIE" crossorigin="anonymous">
    <style>
        .navbar-custom {
            background-color: #495057;
            padding: 15px;
        }
        .navbar-custom .navbar-brand {
            color: #f8f9fa;
            font-size: 1.8rem;
            font-weight: bold;
        }
        .container {
            margin-top: 40px;
        }
        .btn-custom {
            margin: 12px;
            padding: 14px 22px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">Menu Utama</a>
        </div>
    </nav>
    <div class="container text-center">
        <form method="get" action="tampil_data_journals.php">
            <button class="btn btn-primary btn-custom" type="submit" name="action" value="tampil_data_journals">Tampilkan Data Journals</button>
        </form>
        <form method="get" action="tampil_data_journal_details.php">
            <button class="btn btn-secondary btn-custom" type="submit" name="action" value="tampil_data_journal_details">Tampilkan Data Course Classes</button>
        </form>
        <form method="get" action="tampil_tanggal.php">
            <button class="btn btn-info btn-custom" type="submit" name="action" value="tampil_tanggal">Tampilkan Tanggal 13</button>
            <input type="hidden" name="tanggal" value="2024-09-13">
        </form>
        <form method="get" action="tampil_student.php">
            <button class="btn btn-info btn-custom" type="submit" name="action" value="tampil_student">Tampilkan Student</button>
            <input type="hidden" name="nama" value="44">
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-MDiK/rAhA/dAVZfzyefQZXKzRP6gXvPaZoAAnfFGRTFFNdUq5vqM+PH5mG2G9y+P" crossorigin="anonymous"></script>
</body>
</html>
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
    public function fetchData($date = null) {
        $query = $date ? "SELECT * FROM journals WHERE DATE(created_at) = '$date'" : "SELECT * FROM journals";
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

## OUTPUT MENU JURNAL 

![Screenshot (499)](https://github.com/user-attachments/assets/0982b544-e84d-4ec1-9d69-99e3b8bee208)

## OUTPUT MENAMPILKAN SEMUA DATA JURNAL

![Screenshot (500)](https://github.com/user-attachments/assets/7b5efa46-ff54-4a1e-ab1a-296ed12a98b8)

## OUTPUT MENAMPILKAN DATA DETAIL JURNAL 

![Screenshot (501)](https://github.com/user-attachments/assets/6d4e66a9-e797-4566-bdda-a802c83e7b29)

## OUTPUT MENAMPILKAN TANGGAL JURNAL 

![Screenshot (502)](https://github.com/user-attachments/assets/71cb4f81-c52f-495b-beac-dab3828d6ce7)

## OUTPUT MENAMPILKAN ID SISWA 

