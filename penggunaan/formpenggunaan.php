 <?php
	session_start();
	if(isset($_SESSION['login'])){
	include("koneksi.php");
	require 'function.php'; 
	if(isset($_POST["submit"])){
    	if(tambahPenggunaan($_POST) > 0){
    		header('Location: http://localhost/inventory/penggunaan/index.php');
    		exit;
    	}else{
    		header('Location: http://localhost/inventory/penggunaan/index.php');
    		exit;
    	}
    }
?>
<html>
	<head>
		<title>Form Penggunaan Barang</title>
	</head>
	<body>
		<div align="center">
			<form action="" method="post">
				<h2>TAMBAH DATA PENGGUNAAN BARANG</h2>
				<table>
					<tr>
						<td>Start Date</td>
						<td>: <input type="date" name="date" required></td>
					</tr>
					<tr>
						<td>Nama Barang</td>
						<td>: 
							<select id="brg" name="brg">
						      	<?php 
									$barang = penggunaan("SELECT * FROM barang");
									foreach ($barang as $tampil):
								?>
						      	<option value="<?= $tampil["kode_brg"]; ?>" ><?= $tampil["nm_brg"]; ?></option>
								<?php 
									endforeach; 
								?>			      
					    	</select>
						</td>						
					</tr>
					<tr>
						<td>Nama Divisi</td>
						<td>: 
							<select id="div" name="div">
						      	<?php 
									$divisi = penggunaan("SELECT * FROM divisi");
									foreach ($divisi as $tampil):
								?>
						      	<option value="<?= $tampil["id_divisi"]; ?>" ><?= $tampil["nama_divisi"]; ?></option>
								<?php 
									endforeach; 
								?>			      
					    	</select>
					    		<?php
					    			$u= $_SESSION['login'];
									$user = penggunaan("SELECT * FROM user WHERE username='$u'");
									foreach ($user as $tampil):
								?>
							<input type="hidden" name="user" value="<?= $tampil["id_user"]; ?>">
								<?php 
									endforeach; 
								?>	
						</td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Tambah Data Penggunaan Barang">
			</form>
			<div>
				<button onclick="window.location='http://localhost/inventory/penggunaan'">Batal</button>
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