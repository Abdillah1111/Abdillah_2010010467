<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Tambahkan tautan ke file CSS terpisah -->
    <style>
        /* Tambahkan aturan CSS untuk membuat background putih transparan pada banner-content */
        .profile-section {
            background-color: rgba(255, 255, 255, 0.8); /* Warna putih dengan tingkat transparansi 0.8 */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px; /* Jarak antara section dengan elemen setelahnya */
        }

        .profile-section h1 {
            color: #333; /* Warna teks untuk judul */
        }

        .profile-section p {
            color: #555; /* Warna teks untuk paragraf */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info sticky-top" style="background-color:white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" width="70" height="25"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
        <p class="fs-1">LOGBOOK RRI PRO2</p>
            <div class="profile-section">
                <h1>Profile</h1>
                <p class="fs-5">
                    RRI PRO 2 Banjarmasin dengan frekuensi 95.2 FM, adalah stasiun radio lokal yang menyasar pemirsa
                    muda, mengudara dari kota Banjarmasin di Kalimantan Selatan, Indonesia. Merupakan bagian dari jaringan
                    LPP Radio Republik Indonesia (RRI). Pemrograman stasiun ini berfokus pada kreativitas generasi muda di
                    seluruh negeri, menjadikannya sumber informasi populer tentang inisiatif budaya dan kreatif, proyek dan
                    acara yang berkaitan dengan pemuda.
                </p>
                <h1>Slogan</h1>
                <p class="fs-5">"Teman Terbaik Kamu"</p>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
