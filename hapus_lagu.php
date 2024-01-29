<?php
	include 'koneksi.php';
	$id = $_GET['id_lagu'];
	$query = mysqli_query($koneksi, "DELETE FROM daftar_lagu WHERE id_lagu='$id'");

	if($query){
			echo "<script>alert('Data lagu berhasil Dihapus!');
			window.location='lagu.php';
			</script>";

		}else{
			echo"<script>alert('Data admin gagal Dihapus!'); window.location='lagu.php'</script>";
		}
?>