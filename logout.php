<?php
	setcookie('userName', '', time()-3600);
	setcookie('status', '', time()-3600);
	unset($_COOKIE['userName']);
	unset($_COOKIE['status']);
	echo"<script>alert('Logout berhasil');
		window.location='index.php';
		</script>";
?>