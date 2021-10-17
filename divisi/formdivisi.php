<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("koneksi.php"); 
	if(isset($_POST["submit"])){
    	if(tambahDivisi($_POST) > 0){
    		header('Location: http://localhost/inventory/divisi/index.php');
    		exit;
    	}else{
    		header('Location: http://localhost/inventory/divisi/index.php');
    		exit;
    	}
    }
?>
<html>
	<head>
		<title>FORM DIVISI</title>
	</head>
	<body>
		<div align="center">
			<form action="" method="post">
				<h2>TAMBAH DATA DIVISI</h2>
				<table>
					<tr>
						<td>NAMA DIVISI</td>
						<td>: <input type="text" name="nama" required></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Tambah Divisi">
			</form>
			<div>
				<button onclick="window.location='http://localhost/inventory/divisi/index.php'">Batal</button>
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