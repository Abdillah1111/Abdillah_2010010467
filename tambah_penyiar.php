<!DOCTYPE html>
<?php
include("koneksi.php");

if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_penyiar = $_POST['nama_penyiar'];
    $kelamin_penyiar = $_POST['kelamin_penyiar'];
    $tanggal_lahir_penyiar = $_POST['tanggal_lahir_penyiar'];
    $no_telpon_penyiar = $_POST['no_telpon_penyiar'];

    $query = "INSERT INTO data_penyiar VALUES ('$username','$password','$nama_penyiar','$kelamin_penyiar','$tanggal_lahir_penyiar','$no_telpon_penyiar')";
    $exe = mysqli_query($koneksi, $query);

    if ($exe) {
        echo "<script>alert('Data Penyiar berhasil ditambahkan!'); window.location ='penyiar.php';</script>";
    } else {
        echo "<script>alert('Data Penyiar gagal ditambahkan!');</script>";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penyiar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                    <h1 class="text-center mb-5">Tambah Data Penyiar</h1>
                    <form method="post">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                                <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                    <i class="bi bi-eye-slash"></i> <!-- Icon untuk hide password -->
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_penyiar">Nama Penyiar</label>
                            <input type="text" id="nama_penyiar" name="nama_penyiar" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                        <label for="kelamin_penyiar">Jenis Kelamin</label>
                        <select class="form-select" name="kelamin_penyiar" id="kelamin_penyiar">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        </div>  
                        <div class="mb-3">
                            <label for="tanggal_lahir_penyiar">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir_penyiar" name="tanggal_lahir_penyiar" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="no_telpon_penyiar">No Telpon</label>
                            <input type="text" id="no_telpon_penyiar" name="no_telpon_penyiar" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="tambah" class="btn btn-dark w-100">Tambah</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" onclick="window.location.href='penyiar.php'" class="btn btn-dark w-100">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    var passwordInput = document.getElementById('password');
    var togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePasswordButton.innerHTML = '<i class="bi bi-eye"></i>';
        } else {
            passwordInput.type = 'password';
            togglePasswordButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    });
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>