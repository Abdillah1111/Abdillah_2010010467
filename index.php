<!DOCTYPE html>
<?php
if(isset($_COOKIE['userName'])){
	header('location:index.php');
}
?>
<html lang="en">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            background-color: #3498db; /* Warna background biru */
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
    </style>
    <title>Halaman Login</title>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="login_cek.php" method="post">
    	<div class="mb-3">
        	<label for="username">Username</label>
        	<input type="text" name="username" class="form-group" required>
        </div>

        <div class="mb-3">
        	<label for="password">Password</label>
        	<input type="password" name="password" class="form-group" required>
        </div>	
        <div class="mb-3">
	        <input type="submit" class="btn btn-primary btn-sm" name="login" value="Login">
	    </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>