<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("../konek.php");
	include 'function.php'; 
?>
<html>
	<head>
		<title>Data User</title>
	</head>
	<body>
		<div align="center">	
			<h1>Daftar User</h1>
			<a type="button" href="formuser.php">+ Tambah Data User</a>
			<br>
			<br>
			<table border="1" align="center">
				<tr>
					<td>No.</td> 
					<td>Username</td>
					<td colspan="2" align="center">Aksi</td>
				</tr>
					<?php 
						$user = user("SELECT * FROM user");
						$i=1;
						foreach ($user as $tampil):
					?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $tampil["username"]; ?></td>
					<td>
						<a href="delete.php?id=<?= $tampil["id_user"]; ?>"> DELETE </a>
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