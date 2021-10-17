<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("koneksi.php"); 
?>
<html>
	<head>
		<title>Data Divisi</title>
	</head>
	<body>
		<div align="center">	
			<h1>Daftar Divisi</h1>
			<a type="button" href="formdivisi.php">+ Tambah Data Divisi</a>
			<br>
			<br>
			<table border="1" align="center">
				<tr>
					<td>No.</td> 
					<td>Nama Divisi</td>
					<td colspan="2" align="center">Aksi</td>
				</tr>
					<?php 
						$divisi = divisi("SELECT * FROM divisi");
						$i=1;
						foreach ($divisi as $tampil):
					?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $tampil["nama_divisi"]; ?></td>
					<td>
						<a href="edit.php?id=<?= $tampil["id_divisi"]; ?>"> EDIT </a>
					</td>
					<td>
						<a href="delete.php?id=<?= $tampil["id_divisi"]; ?>"> DELETE </a>
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