<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("../konek.php"); 
	include 'function.php';
	if(isset($_POST["submit"])){
    	if(tambahUser($_POST) > 0){
    		header('Location: http://localhost/inventory/user/index.php');
    		exit;
    	}else{
    		header('Location: http://localhost/inventory/user/index.php');
    		exit;
    	}
    }
?>
<html>
	<head>
		<title>FORM USER</title>
	</head>
	<body>
		<div align="center">
			<form action="" method="post">
				<h2>TAMBAH DATA USER</h2>
				<table>
					<tr>
						<td>Username</td>
						<td>: <input type="text" name="username" required></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>: <input type="password" name="password" required></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Tambah User">
			</form>
			<div>
				<button onclick="window.location='http://localhost/inventory/user/index.php'">Batal</button>
			</div>
		</div>
	</body>
</html>
<?php
	}else{
		//gagal login
		die ("<h3 align='center'>Maaf, anda belum login. Klik <a href='../index.php'>di sini</a> untuk login</h3>");
	}
?>