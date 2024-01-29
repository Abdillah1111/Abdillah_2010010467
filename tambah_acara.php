<!DOCTYPE html>
<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_acara_siaran = $_POST['nama_acara_siaran'];
    $deskripsi = $_POST['deskripsi'];
    $hari_siaran = isset($_POST['hari_siaran']) ? $_POST['hari_siaran'] : array();

    // Gunakan implode hanya jika ada pilihan yang dipilih
    $hari_siaran_str = (!empty($hari_siaran)) ? implode(", ", $hari_siaran) : "";

    // Pastikan untuk menggunakan parameterized query untuk mencegah SQL injection
    $query = "INSERT INTO daftar_acara_siaran (nama_acara_siaran, deskripsi, hari_siaran) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sss", $nama_acara_siaran, $deskripsi, $hari_siaran_str);
    $exe = mysqli_stmt_execute($stmt);

    if ($exe) {
        echo "<script>alert('Acara Siaran berhasil ditambahkan!'); window.location ='acara.php';</script>";
    } else {
        echo "<script>alert('Acara Siaran gagal ditambahkan!');</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Acara Siaran</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Tambahkan tautan ke file CSS terpisah -->
    <style>
    .hari-siaran-container {
        background-color: transparent;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .checkbox-label {
        background-color: white;
        padding: 5px;
        margin: 2px;
        border-radius: 3px;
        color: black; /* Warna teks hitam */
    }
</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info sticky-top" style="background-color:white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" width="70" height="25">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="siaran.php">Data Siaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="lagu.php">Data Lagu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="penyiar.php">Data Penyiar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="acara.php">Daftar Acara Siaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="jadwal.php">Jadwal Siaran</a>
                    </li>
                    <li class="nav-item">
                    <?php
    if(isset($_COOKIE['userName'])) {
        echo '<a href="logout.php" class="nav-link" title="Logout">Logout</a>';
    } else {
        echo '<a href="index.php" class="nav-link" title="Login">Login</a>';
    }
    ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid banner">
        <div class="container banner-content col-lg-6">
            <div class="container-fluid py-5">
                <div class="container">
                    <h1 class="text-center mb-5">Tambah Data Acara</h1>
<form method="post">
    <div class="mb-3">
        <label for="nama_acara_siaran">Nama Acara</label>
        <input type="text" id="nama_acara_siaran" name="nama_acara_siaran" class="form-control" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="deskripsi">Deskripsi Acara</label>
        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" autocomplete="off"></textarea>
    </div>
    <div class="mb-3 hari-siaran-container">
                            <label for="hari_siaran">Hari Siaran</label>
                            <div class="mb-3">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="hari_siaran[]" value="Senin"> Senin
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="hari_siaran[]" value="Selasa"> Selasa
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="hari_siaran[]" value="Rabu"> Rabu
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="hari_siaran[]" value="Kamis"> Kamis
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="hari_siaran[]" value="Jumat"> Jumat
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="hari_siaran[]" value="Sabtu"> Sabtu
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="hari_siaran[]" value="Minggu"> Minggu
                                </label>
                            </div>
                        </div>
    <div class="mb-3">
        <button type="submit" name="tambah" class="btn btn-dark w-100">Tambah</button>
    </div>
    <div class="mb-3">
        <button type="button" onclick="window.location.href='acara.php'" class="btn btn-dark w-100">Kembali</button>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
