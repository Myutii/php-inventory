<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("../konek.php");
	include 'function.php'; 
?>
<html>
	<head>
		<title>Data Barang</title>
	</head>
	<body>
		<div align="center">	
			<h1>Daftar Barang</h1>
			<a type="button" href="formbarang.php">+ Tambah Data Barang</a>
			<br>
			<br>
			<table border="1" align="center">
				<tr>
					<td>No.</td> 
					<td>Nama Barang</td>
					<td>Jenis Barang</td>
					<td>Keterangan</td>
					<td colspan="2" align="center">Aksi</td>
				</tr>
					<?php 
						$barang = barang("SELECT * FROM barang");
						$i=1;
						foreach ($barang as $tampil):
					?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $tampil["nm_brg"]; ?></td>
					<td><?= $tampil["jenis_brg"]; ?></td>
					<td><?= $tampil["ket"]; ?></td>
					<td>
						<a href="edit.php?id=<?= $tampil["kode_brg"]; ?>"> EDIT </a>
					</td>
					<td>
						<a href="delete.php?id=<?= $tampil["kode_brg"]; ?>"> DELETE </a>
					</td>
				</tr>
				<?php 
						$i++;
						endforeach; 
					?>
			</table>
			<br>
			<a type="button" href="../hlmnutama.php">Home</a>
		</div>
	</body>
</html>
<?php
	}else{
		//gagal login
		die ("<h3 align='center'>Maaf, anda belum login. Klik <a href='../index.php'>di sini</a> untuk login</h3>");
	}
?>	