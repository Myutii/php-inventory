<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("../konek.php");
	require 'function.php'; 
	if(isset($_POST["submit"])){
    	if(editBarang($_POST) > 0){
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
		<title>EDIT BARANG</title>
	</head>
	<body>
		<div align="center">
			<form action="" method="post">
				<h2>EDIT DATA BARANG</h2>
				<table>
					<?php 
	                    $id = $_GET['id'];    
	    
	                    $barang = barang("SELECT * FROM barang WHERE kode_brg=$id");
	                    foreach ($barang as $tampil): 
	                ?>
					<tr>
						<input type="hidden" name="id" value="<?= $tampil["kode_brg"]; ?>"> 
					</tr>
					<tr>
						<td>Nama Barang</td>
						<td>: <input type="text" name="nama" value="<?= $tampil["nm_brg"]; ?>"></td>
					</tr>
					<tr>
						<td>Jenis Barang</td>
						<td>: <input type="text" name="jenis" value="<?= $tampil["jenis_brg"]; ?>"></td>
					</tr>
					<tr>
						<td>Keterangan Barang</td>
						<td>: <input type="text" name="ket" value="<?= $tampil["ket"]; ?>"></td>
					</tr>
					<?php endforeach; ?>
				</table>
				
				<input type="submit" name="submit" value="Edit Penggunaan Barang">
			</form>
			<button onclick="window.location='http://localhost/inventory/barang/index.php'">Batal</button>
		</div>
	</body>
</html>
<?php
	}else{
		//gagal login
		die ("<h3 align='center'>Maaf, anda belum login. Klik <a href='../index.php'>di sini</a> untuk login</h3>");
	}
?>