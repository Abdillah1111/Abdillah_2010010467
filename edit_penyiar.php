<!DOCTYPE html>
<?php
include('koneksi.php');
  if(empty($_GET['username'])){
    echo "<script>alert('Pilih data penyiar yang di ingin di Edit!');
    window.location = 'penyiar.php';
    </script>";
  }
  else{
    $idUpdate = $_GET['username'];
    $exe = mysqli_query($koneksi, "SELECT * FROM data_penyiar WHERE  username = '$idUpdate'");
    $data = mysqli_fetch_array($exe);
      $a = $data[1]; 
      $b = $data[2];
      $c = $data[3];
      $d = $data[4]; 
      $e = $data[0];
      $f = $data[5];
      

    }

if(isset($_POST['update'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_penyiar = $_POST['nama_penyiar'];
  $kelamin_penyiar = $_POST['kelamin_penyiar'];
  $tanggal_lahir_penyiar = $_POST['tanggal_lahir_penyiar'];
  $no_telpon_penyiar = $_POST['no_telpon_penyiar'];
  $query = "UPDATE data_penyiar set 
                      username ='$username',
                      password ='$password',
                      nama_penyiar ='$nama_penyiar',
                      tanggal_lahir_penyiar='$tanggal_lahir_penyiar',
                      no_telpon_penyiar='$no_telpon_penyiar',
                      kelamin_penyiar ='$kelamin_penyiar' where username ='$e'";
      $exe = mysqli_query($koneksi, $query);
    if($exe){
      echo "<script>alert('Data Penyiar Berhasil di Ubah!');
      window.location='penyiar.php';
      </script>";
    }
    else{
      echo "<script>alert('Data Penyiar Gagal di Ubah!'); 
      window.location='penyiar.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        <h1 class="text-center mb-5">Edit Data Penyiar</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" value="<?= $e ?>" name="username" class="form-control" autocomplete="off" readonly>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" value="<?= $a ?>" name="password" class="form-control" autocomplete="off">
                    <button type="button" id="togglePassword" class="btn btn-outline-secondary">
    <i class="bi bi-eye"></i> <!-- Mengganti dengan simbol mata terbuka -->
</button>

                </div>
            </div>
    <div class="mb-3">
        <label for="nama_penyiar">Nama Penyiar</label>
             <input type="text" value="<?= $b?>" name="nama_penyiar" class="form-control" autocomplete="off">
         </div>
     <div class="mb-3">
        <label for="kelamin_penyiar">Jenis Kelamin</label>
         <select class="form-select" name="kelamin_penyiar" id="kelamin_penyiar">
         <option value="<?= $c?>"><?= $c?></option>
           <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
     </select>
              </div>  
              <div class="mb-3">
      <label for="tanggal_lahir_penyiar">Tanggal Lahir</label>
      <input type="date" value="<?= $d?>" name="tanggal_lahir_penyiar" class="form-control" autocomplete="off" >
    </div>
          <div class="mb-3">
           <label for="no_telpon_penyiar">No Telpon</label>
                <input type="text" value="<?= $f?>" name="no_telpon_penyiar" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                <button type="submit" name="update" class="btn btn-dark w-100">Edit</button>
            </div>
            <div class="mb-3">
                <button type="button" onclick="window.location.href='penyiar.php'" class="btn btn-dark w-100">Kembali</button>
            </div>
        </form>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var passwordInput = document.querySelector('#password');
    var togglePasswordButton = document.querySelector('#togglePassword');

    if (passwordInput && togglePasswordButton) {
        togglePasswordButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordButton.innerHTML = '<i class="bi bi-eye"></i>';
            } else {
                passwordInput.type = 'password';
                togglePasswordButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
            }
        });
    }
});
</script>



    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>