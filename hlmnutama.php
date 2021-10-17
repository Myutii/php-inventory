<?php
	session_start();
	if(!isset($_SESSION['login'])){
		
		//gagal login
		die ("<h3 align='center'>Maaf, anda belum login. Klik <a href='index.php'>di sini</a> untuk login</h3>");
	}else{
		//jika sudah login,menampilkan isi section
		echo "<h1 align='center'> Selamat Datang ".$_SESSION['login']."</h1>";
	}
?>
		<h2 align='center'>
			<a href="divisi">Data Divisi</a> - 
			<a href="barang">Data Barang</a> - 
			<a href="penggunaan">Data Penggunaan Barang</a> - 
			<a href="user">Data User</a> - 
			<a href='out.php'>Logout</a>
		</h2>