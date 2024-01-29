<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Siaran</title>
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
    <div>
        <p class="fs-1">
            JADWAL SIARAN
        </p>
    </div>
    <nav class="navbar bg-body-white" >
  <div class="container-fluid">

  	<?php  
          echo'<a href="tambah_jadwal.php" class="btn btn-success"  title="tambah data">Tambah</i></a>';
      ?>
  </div>
</nav>
    <!-- Tabel ditempatkan di sini -->
    <div>
        <table id="example" class="table table-striped" style="width:100%; background-color:white;" border="1">
            <thead>
                <tr>
                    <th scope="col">Aksi</th>
                    <th scope="col">Tanggal Siaran</th>
                    <th scope="col">Nama Penyiar</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Selesai</th>
                </tr>
            </thead>
            <tbody>
            <?php include("koneksi.php"); ?>
    <?php
              $cari = "SELECT * FROM jadwal_siaran";
              $query = mysqli_query($koneksi,$cari);
              $jlhData = mysqli_num_rows($query);
          if($jlhData == 0){
              echo"<tr><td colspan=5>Jadwal Siaran Tidak Ada</td></tr>";
          } else {
            ?>
            <?php while ($row = mysqli_fetch_array($query)) : ?>
  <tr>
      <?php
        echo "<td><a class='btn btn-sm btn-success' href='edit_jadwal.php?id_jadwal=".$row[0]."'>Edit</a>| 
                <a class='btn btn-sm btn-danger' href = 'hapus_jadwal.php?id_jadwal=".$row[0]."'";?> onclick="return confirm('yakin ingin menghapus jadwal ini')">Hapus</a></td>
      <td><?= $row["tanggal_siaran"] ?></td>
      <td><?php $data_penyiar = mysqli_query($koneksi, "select * from data_penyiar");
                  while ($p = mysqli_fetch_array($data_penyiar)) {
                    if ($p['username'] == $row['id_penyiar']) { ?>
                    <?php echo $p['nama_penyiar'];?> 
                      <?php }
                            }
                            ?>
                            </td>
      <td><?= $row["waktu_mulai"] ?></td>
      <td><?= $row["waktu_selesai"] ?></td>
      </tr>
  <?php endwhile; ?>   
<?php } ?>
                <tr>
                </tr>
            </tbody>
        </table>
        <?php 
echo'<a href="cetak_jadwal.php" target="_blank"><button class="btn btn-success">CETAK</button></a>';
?>
    </div>
</div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
