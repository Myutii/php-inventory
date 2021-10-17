<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("koneksi.php");
	include 'function.php'; 
?>
<html>
	<head>
		<title>Data Penggunaan Barang</title>
	</head>
	<body>
		<div align="center">	
			<h1>Daftar Penggunaan Barang</h1>
			<a type="button" href="formpenggunaan.php">+ Tambah Data Penggunaan Barang</a>
			<br>
			<br>
			<table border="1" align="center">
				<tr>
					<td>No.</td>
					<td>ID Penggunaan</td> 
					<td>Start Date</td>
					<td>Nama Barang</td>
					<td>Nama Divisi</td>
					<td>User</td>
					<td colspan="2" align="center">Aksi</td>
				</tr>
					<?php 
						$penggunaan = penggunaan("SELECT a.id, a.start_date, b.nm_brg, c.nama_divisi, d.username FROM penggunaan a INNER JOIN barang b INNER JOIN divisi c INNER JOIN user d on (a.kode_brg=b.kode_brg) AND (a.id_divisi=c.id_divisi) AND (a.id_user=d.id_user)");
						$i=1;
						foreach ($penggunaan as $tampil):
					?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $tampil["id"]; ?></td>
					<td><?= $tampil["start_date"]; ?></td>
					<td><?= $tampil["nm_brg"]; ?></td>
					<td><?= $tampil["nama_divisi"]; ?></td>
					<td><?= $tampil["username"]; ?></td>
					<td>
						<a href="edit.php?id=<?= $tampil["id"]; ?>"> EDIT </a>
					</td>
					<td>
						<a href="delete.php?id=<?= $tampil["id"]; ?>"> DELETE </a>
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
	