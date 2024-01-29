<?php
	include 'koneksi.php';
	$id = $_GET['id_siaran'];
	$query = mysqli_query($koneksi, "DELETE FROM data_siaran WHERE id_siaran='$id'");

	if($query){
			echo "<script>alert('Data Siaran berhasil Dihapus!');
			window.location='siaran.php';
			</script>";

		}else{
			echo"<script>alert('Data Siaran gagal Dihapus!'); window.location='siaran.php'</script>";
		}
?>