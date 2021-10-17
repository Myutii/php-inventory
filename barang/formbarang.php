<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("../konek.php"); 
	include 'function.php';
	if(isset($_POST["submit"])){
    	if(tambahBarang($_POST) > 0){
    		header('Location: http://localhost/inventory/barang/index.php');
    		exit;
    	}else{
    		header('Location: http://localhost/inventory/barang/index.php');
    		exit;
    	}
    }
?>
<html>
	<head>
		<title>FORM BARANG</title>
	</head>
	<body>
		<div align="center">
			<form action="" method="post">
				<h2>TAMBAH DATA BARANG</h2>
				<table>
					<tr>
						<td>Nama Barang</td>
						<td>: <input type="text" name="nama" required></td>
					</tr>
					<tr>
						<td>Jenis Barang</td>
						<td>: <input type="text" name="jenis" required></td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>: <input type="text" name="ket" required></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Tambah Barang">
			</form>
			<div>
				<button onclick="window.location='http://localhost/inventory/barang/index.php'">Batal</button>
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