<!DOCTYPE html>
<?php
include('koneksi.php');

if (empty($_GET['id_acara'])) {
    echo "<script>alert('Pilih dulu acara yang ingin di perbaharui!'); window.location = 'acara.php';</script>";
} else {
    $idUpdate = $_GET['id_acara'];
    $exe = mysqli_query($koneksi, "SELECT * FROM daftar_acara_siaran WHERE id_acara = '$idUpdate'");
    $data = mysqli_fetch_array($exe);
    $nama_acara_siaran = $data['nama_acara_siaran'];
    $deskripsi = $data['deskripsi'];
    $hari_siaran = explode(", ", $data['hari_siaran']);
}

if (isset($_POST['update'])) {
    $nama_acara_siaran = $_POST['nama_acara_siaran'];
    $deskripsi = $_POST['deskripsi'];
    $hari_siaran = isset($_POST['hari_siaran']) ? $_POST['hari_siaran'] : array();
    $hari_siaran_str = implode(", ", $hari_siaran);

    $query = "UPDATE daftar_acara_siaran SET 
                    nama_acara_siaran ='$nama_acara_siaran',
                    deskripsi ='$deskripsi',
                    hari_siaran ='$hari_siaran_str' WHERE id_acara ='$idUpdate'";

    $exe = mysqli_query($koneksi, $query);

    if ($exe) {
        echo "<script>alert('Acara Siaran Berhasil di Ubah!'); window.location='acara.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data Acara Siaran!'); window.location='acara.php';</script>";
    }
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
                    <h1 class="text-center mb-5">Edit Data Acara</h1>

    <form action="" method="POST">
        <label for="nama_acara_siaran">Nama Acara</label>
        <input type="text" name="nama_acara_siaran" class="form-control" value="<?php echo $nama_acara_siaran; ?>" autocomplete="off">

        <label for="deskripsi">Deskripsi Acara</label>
        <textarea name="deskripsi" class="form-control" rows="3" autocomplete="off"><?php echo $deskripsi; ?></textarea>

        <label for="hari_siaran">Hari Siaran</label>
<div class="mb-3 hari-siaran-container">
    <?php
    $days = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
    foreach ($days as $day) {
        echo "<label class='checkbox-label'>
                <input type='checkbox' name='hari_siaran[]' value='$day' " . (in_array($day, $hari_siaran) ? 'checked' : '') . "> $day
              </label>";
    }
    ?>
</div>
       <div class="mb-3">
      <button type="submit" name="update" value="Update" class="btn btn-dark w-100">Edit</button>  
    </div>
    <div class="mb-3">
      <button type="button" onclick="window.location.href='acara.php'" class="btn btn-dark w-100">Kembali</button>  
    </div>
  </form>
	
</div>
</div>
        
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>