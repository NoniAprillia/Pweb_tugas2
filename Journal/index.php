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
            <button class="btn btn-primary btn-custom" type="submit" name="action" value="tampil_data_journals">Tampilkan Data Jurnal </button>
        </form>
        <form method="get" action="tampil_data_journal_details.php">
            <button class="btn btn-secondary btn-custom" type="submit" name="action" value="tampil_data_journal_details">Tampilkan Data Detail Jurnal</button>
        </form>
        <form method="get" action="tampil_tanggal.php">
            <button class="btn btn-info btn-custom" type="submit" name="action" value="tampil_tanggal">Tampilkan Tanggal 13</button>
            <input type="hidden" name="tanggal" value="2024-09-13">
        </form>
        <form method="get" action="tampil_student.php">
            <button class="btn btn-info btn-custom" type="submit" name="action" value="tampil_student">Tampilkan Id Kelas Siswa</button>
            <input type="hidden" name="nama" value="44">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-MDiK/rAhA/dAVZfzyefQZXKzRP6gXvPaZoAAnfFGRTFFNdUq5vqM+PH5mG2G9y+P" crossorigin="anonymous"></script>
</body>
</html>
