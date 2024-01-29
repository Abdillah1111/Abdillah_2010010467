<!DOCTYPE html>
<?php
include('koneksi.php');
  if(empty($_GET['id_lagu'])){
    echo "<script>alert('Pilih data lagu yang di ingin di Edit!');
    window.location = 'lagu.php';
    </script>";
  }
  else{
    $idUpdate = $_GET['id_lagu'];
    $exe = mysqli_query($koneksi, "SELECT * FROM daftar_lagu WHERE  id_lagu = '$idUpdate'");
    $data = mysqli_fetch_array($exe);
      $a = $data[1]; 
      $b = $data[2];
      $c = $data[3];
      $d = $data[0];
      

    }

if(isset($_POST['update'])){
  $id_lagu = $_POST['id_lagu'];
  $judul_lagu = $_POST['judul_lagu'];
  $genre = $_POST['genre'];
  $tahun = $_POST['tahun'];
  $query = "UPDATE daftar_lagu set 
                      judul_lagu ='$judul_lagu',
                      genre ='$genre',
                      tahun ='$tahun' where id_lagu ='$d'";
      $exe = mysqli_query($koneksi, $query);
    if($exe){
      echo "<script>alert('Data Lagu Berhasil di Ubah!');
      window.location='lagu.php';
      </script>";
    }
    else{
      echo "<script>alert('Data lagu Gagal di Ubah!'); 
      window.location='edit_lagu.php';
      </script>";
    }
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h1 class="text-center mb-5">Edit Data Lagu</h1>
        <form action="" method="POST">
    <div class="mb-3">
        <label for="judul_lagu">Judul & Penyanyi Lagu</label>
             <input type="text" value="<?= $a?>" name="judul_lagu" class="form-control" autocomplete="off">
         </div>
     <div class="mb-3">
        <label for="genre">Genre Lagu</label>
         <select class="form-select" name="genre" id="genre">
         <option value="<?= $b?>"><?= $b?></option>
         <option value="Pop">POP</option>
        <option value="Dangdut">Dangdut</option>
        <option value="Jazz">Jazz</option>
        <option value="Kpop">Kpop</option>
        <option value="Rock">Rock</option>
     </select>
              </div>  
              <div class="mb-3">
      <label for="tahun ">Tahun Lagu</label>
      <input type="text" value="<?= $c?>" name="tahun" class="form-control" autocomplete="off" >
    </div>
                        <div class="mb-3">
                <button type="submit" name="update" class="btn btn-dark w-100">Edit</button>
            </div>
            <div class="mb-3">
                <button type="button" onclick="window.location.href='lagu.php'" class="btn btn-dark w-100">Kembali</button>
            </div>
        </form>
    </div>
</div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>