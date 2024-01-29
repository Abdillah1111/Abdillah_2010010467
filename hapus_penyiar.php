<?php
	include 'koneksi.php';
	$id = $_GET['username'];
	$query = mysqli_query($koneksi, "DELETE FROM data_penyiar WHERE username='$id'");

	if($query){
			echo "<script>alert('Data admin penyiar berhasil Dihapus!');
			window.location='penyiar.php';
			</script>";

		}else{
			echo"<script>alert('Data admin gagal Dihapus!'); window.location='penyiar.php'</script>";
		}
?>