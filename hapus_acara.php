<?php
	include 'koneksi.php';
	$id = $_GET['id_acara'];
	$query = mysqli_query($koneksi, "DELETE FROM daftar_acara_siaran WHERE id_acara='$id'");

	if($query){
			echo "<script>alert('Data acara siaran berhasil Dihapus!');
			window.location='acara.php';
			</script>";

		}else{
			echo"<script>alert('Data acara siaran gagal Dihapus!'); window.location='acara.php'</script>";
		}
?>