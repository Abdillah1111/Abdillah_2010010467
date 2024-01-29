<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siaran</title>
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
            Data Siaran
        </p>
    </div>
    <nav class="navbar bg-body-white" >
  <div class="container-fluid">

  	<?php  
          echo'<a href="tambah_siaran.php" class="btn btn-success"  title="tambah data">Tambah</i></a>';
      ?>
  </div>
</nav>
    <!-- Tabel ditempatkan di sini -->
    <div class="container-fluid">
    <table id="example" class="table table-striped mx-auto" style="width:100%; background-color:white;" border="1">
        <thead>
            <tr>
                <th scope="col">Aksi</th>
                <th scope="col">No</th>
                <th scope="col">Nama Penyiar</th>
                <th scope="col">Nama Acara</th>
                <th scope="col">Topik Siaran</th>
                <th scope="col">Lagu diputar</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Tanggal Siaran</th>
            </tr>
        </thead>
        <tbody>
            <?php include("koneksi.php"); ?>
            <?php
            $cari = "SELECT * FROM data_siaran";
            $query = mysqli_query($koneksi, $cari);
            $jlhData = mysqli_num_rows($query);

            if ($jlhData == 0) {
                echo "<tr><td colspan='9'>Jadwal Siaran Tidak Ada</td></tr>";
            } else {
                while ($row = mysqli_fetch_array($query)) :
            ?>
                    <tr>
                        <td>
                            <a class='btn btn-sm btn-success' href='edit_siaran.php?id_siaran=<?= $row[0] ?>'>Edit</a>
                            | 
                            <a class='btn btn-sm btn-danger' href='hapus_siaran.php?id_siaran=<?= $row[0] ?>' onclick="return confirm('Yakin ingin menghapus jadwal ini')">Hapus</a>
                        </td>
                        <td><?= $row["id_siaran"] ?></td>
                        <td>
                            <?php
                            $data_penyiar = mysqli_query($koneksi, "SELECT * FROM data_penyiar");
                            while ($p = mysqli_fetch_array($data_penyiar)) {
                                if ($p['username'] == $row['username']) {
                                    echo $p['nama_penyiar'];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $daftar_acara_siaran = mysqli_query($koneksi, "SELECT * FROM daftar_acara_siaran");
                            while ($p = mysqli_fetch_array($daftar_acara_siaran)) {
                                if ($p['id_acara'] == $row['id_acara']) {
                                    echo $p['nama_acara_siaran'];
                                }
                            }
                            ?>
                        </td>
                        <td><?= $row["topik_siaran"] ?></td>
                        <td>
                            <?php
                            $daftar_lagu = mysqli_query($koneksi, "SELECT * FROM daftar_lagu");
                            while ($p = mysqli_fetch_array($daftar_lagu)) {
                                if ($p['id_lagu'] == $row['id_lagu']) {
                                    echo $p['judul_lagu'];
                                }
                            }
                            ?>
                        </td>
                        <td><?= $row["waktu_mulai"] ?></td>
                        <td><?= $row["waktu_selesai"] ?></td>
                        <td><?= $row["tanggal_siaran"] ?></td>
                    </tr>
            <?php endwhile;
            } ?>
            <tr></tr>
        </tbody>
    </table>
    <?php 
echo'<a href="cetak_siaran.php" target="_blank"><button class="btn btn-success">CETAK</button></a>';
?>
</div>

</div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
