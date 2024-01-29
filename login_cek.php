<?php
	include ('koneksi.php');
	if(isset($_POST['login'])) {
		$user = $_POST['username'];
		$pass = $_POST['password']; 	
		$query ="select * from data_penyiar where username='$user' and password='$pass'";
		$exe = mysqli_query($koneksi, $query);
		if(mysqli_num_rows($exe)>=1){
			$data = mysqli_fetch_row($exe);
			setcookie('userName',$data[2]);
			setcookie('status', $data[3]);
			echo "<script>alert('login berhasil!');
			window.location = 'home.php'</script>";
		}else{
			echo "<script>alert('username dan password tidak cocok');
			window.location = 'index.php'
			</script>";
		}
	}
?>