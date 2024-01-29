<!DOCTYPE html>
<?php
include("koneksi.php");

if (isset($_POST['tambah'])) {
    $id_siaran = $_POST['id_siaran'];
    $username = $_POST['username'];
    $id_acara = $_POST['id_acara'];
    $topik_siaran = $_POST['topik_siaran'];
    $id_lagu = $_POST['id_lagu'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $tanggal_siaran = $_POST['tanggal_siaran'];

    $query = "INSERT INTO data_siaran VALUES ('$id_siaran','$username','$id_acara','$topik_siaran','$id_lagu','$waktu_mulai','$waktu_selesai','$tanggal_siaran')";
    $exe = mysqli_query($koneksi, $query);

    if ($exe) {
        echo "<script>alert('Data Siaran berhasil ditambahkan!'); window.location ='siaran.php';</script>";
    } else {
        echo "<script>alert('Data Siaran gagal ditambahkan!');</script>";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siaran</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Tambahkan tautan ke file CSS terpisah -->
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
                    <h1 class="text-center mb-5">Tambah Data Siaran</h1>
                    <form method="post">
                        <div class="mb-3">
                            <label for="username">Nama Penyiar</label>
                            <select class="form-select" name="username">
                                    <?php
                                    $data = mysqli_query($koneksi,"select * from data_penyiar");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                <option value="<?= $d['username'];?>"><?= $d['nama_penyiar'];?></option>
                                <?php } ?>
                            </select>
                            </div>
                        <div class="mb-3">
                            <label for="id_acara">Nama Acara Siaran</label>
                            <select class="form-select" name="id_acara">
                                    <?php
                                    $data = mysqli_query($koneksi,"select * from daftar_acara_siaran");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                <option value="<?= $d['id_acara'];?>"><?= $d['nama_acara_siaran'];?></option>
                                <?php } ?>
                            </select>
                            </div>
                        <div class="mb-3">
                            <label for="id_lagu">Lagu diputar</label>
                            <select class="form-select" name="id_lagu">
                                    <?php
                                    $data = mysqli_query($koneksi,"select * from daftar_lagu");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                <option value="<?= $d['id_lagu'];?>"><?= $d['judul_lagu'];?></option>
                                <?php } ?>
                            </select>
                            </div>
                        <div class="mb-3">
                            <label for="topik_siaran">Topik Siaran</label>
                            <input type="text" id="topik_siaran" name="topik_siaran" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="waktu_mulai">Waktu Mulai</label>
                            <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="waktu_selesai">Waktu Selesai</label>
                            <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_siaran">Tanggal_siaran</label>
                            <input type="date" id="tanggal_siaran" name="tanggal_siaran" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="tambah" class="btn btn-dark w-100">Tambah</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" onclick="window.location.href='jadwal.php'" class="btn btn-dark w-100">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
