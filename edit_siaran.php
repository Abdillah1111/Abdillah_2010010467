<!DOCTYPE html>
<?php
include('koneksi.php');
  if(empty($_GET['id_siaran'])){
    echo "<script>alert('Pilih dulu data yang di ingin di perbaharui!');
    window.location = 'siaran.php';
    </script>";
  }
  else{
    $idUpdate = $_GET['id_siaran'];
    $exe = mysqli_query($koneksi, "SELECT * FROM data_siaran WHERE  id_siaran = '$idUpdate'");
    $data = mysqli_fetch_array($exe);
      $a = $data[1]; 
      $b = $data[2];
      $c = $data[3];
      $d = $data[4]; 
      $e = $data[0];
      $f = $data[5];
      $g = $data[6];
      $h = $data[7];
  }

if(isset($_POST['update'])){
    $username = $_POST['username'];
    $id_acara = $_POST['id_acara'];
    $topik_siaran = $_POST['topik_siaran'];
    $id_lagu =  $_POST['id_lagu'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $tanggal_siaran = $_POST['tanggal_siaran'];
    $query = "UPDATE data_siaran SET 
    username = '$username',
    id_acara = '$id_acara',
    topik_siaran = '$topik_siaran',
    id_lagu = '$id_lagu',
    waktu_mulai = '$waktu_mulai',
    waktu_selesai = '$waktu_selesai',
    tanggal_siaran = '$tanggal_siaran' 
  WHERE id_siaran = '$e'";

      $exe = mysqli_query($koneksi, $query);
    if($exe){
      echo "<script>alert('Data Siaran Berhasil di Ubah!');
      window.location='siaran.php';
      </script>";
    }
    else{
      echo "<script>alert('Data Siaran Gagal di Ubah!'); 
      </script>";
    }
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siaran</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Tambahkan tautan ke file CSS terpisah -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info sticky-top" style="background-color:white;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
              <img src="img/logo.png" width="70" height="25"  ></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="siaran.php">Data Siaran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="lagu.php">Data Lagu</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="penyiar.php">Data Penyiar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="acara.php">Daftar Acara Siaran</a>
                  <li class="nav-item">
                      <a class="nav-link active" href="jadwal.php">Jadwal Siaran</a>
                      <li class="nav-item">
                      <?php
    if(isset($_COOKIE['userName'])) {
        echo '<a href="logout.php" class="nav-link" title="Logout">Logout</a>';
    } else {
        echo '<a href="index.php" class="nav-link" title="Login">Login</a>';
    }
    ?>
        </li>
                    </li>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container-fluid banner">
        <div class="container banner-content col-lg-6">
            
        <div class="container-fluid py-5">
	<div class="container">
  <h1 class="text-center mb-5">Edit Data Siaran</h1>
  <form action="" method="POST">
  <div class="mb-3">
      <label for="username">Nama Penyiar</label>
      <select class="form-select" name="username">
          <?php 
              $penyiar = mysqli_query($koneksi, "select * from data_penyiar");
              while ($p = mysqli_fetch_array($penyiar)){
                if ($p['username'] == $data['username']) { ?>
                  <option value="<?= $p['username']; ?>" selected><?= $p['nama_penyiar']; ?></option>";
                <?php }else{ ?>
                  <option value="<?= $p['username']; ?>"><?= $p['nama_penyiar']; ?></option>";
                <?php }
              }
          ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="id_acara">Nama Acara Siaran</label>
      <select class="form-select" name="id_acara">
          <?php 
              $acara = mysqli_query($koneksi, "select * from daftar_acara_siaran");
              while ($p = mysqli_fetch_array($acara)){
                if ($p['nama_acara_siaran'] == $data['id_acara']) { ?>
                  <option value="<?= $p['id_acara']; ?>" selected><?= $p['nama_acara_siaran']; ?></option>";
                <?php }else{ ?>
                  <option value="<?= $p['id_acara']; ?>"><?= $p['nama_acara_siaran']; ?></option>";
                <?php }
              }
          ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="topik_siaran">Topik Siaran</label>
      <input type="text" value="<?= $c?>" name="topik_siaran" class="form-control" autocomplete="off">
    </div>
    <div class="mb-3">
      <label for="id_lagu">Lagu diputar</label>
      <select class="form-select" name="id_lagu">
          <?php 
              $acara = mysqli_query($koneksi, "select * from daftar_lagu");
              while ($p = mysqli_fetch_array($acara)){
                if ($p['judul_lagu'] == $data['id_lagu']) { ?>
                  <option value="<?= $p['id_lagu']; ?>" selected><?= $p['judul_lagu']; ?></option>";
                <?php }else{ ?>
                  <option value="<?= $p['id_lagu']; ?>"><?= $p['judul_lagu']; ?></option>";
                <?php }
              }
          ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="waktu_mulai">Waktu Mulai</label>
      <input type="time" value="<?= $f?>" name="waktu_mulai" class="form-control" autocomplete="off">
    </div>
    <div class="mb-3">
      <label for="waktu_selesai">Waktu Selesai</label>
      <input type="time" value="<?= $g?>" name="waktu_selesai" class="form-control" autocomplete="off"  >
    </div>
    <div class="mb-3">
      <label for="tanggal_siaran">Tanggal Siaran</label>
      <input type="date" value="<?= $h?>" name="tanggal_siaran" class="form-control" autocomplete="off" >
    </div>
    <div class="mb-3">
      <button type="submit" name="update" value="Update" class="btn btn-dark w-100">Edit</button>  
    </div>
    <div class="mb-3">
      <button type="button" onclick="window.location.href='siaran.php'" class="btn btn-dark w-100">Kembali</button>  
    </div>
  </form>
	
</div>
</div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>