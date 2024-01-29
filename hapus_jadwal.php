<?php
	include 'koneksi.php';
	$id = $_GET['id_jadwal'];
	$query = mysqli_query($koneksi, "DELETE FROM jadwal_siaran WHERE id_jadwal='$id'");

	if($query){
			echo "<script>alert('Jadwal berhasil Dihapus!');
			window.location='jadwal.php';
			</script>";

		}else{
			echo"<script>alert('Data Penyiar gagal Dihapus!'); window.location='jadwal.php'</script>";
		}
?>