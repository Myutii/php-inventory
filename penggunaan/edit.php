<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("koneksi.php"); 
	require 'function.php';
	if(isset($_POST["submit"])){
    	if(editPenggunaan($_POST) > 0){
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
		<title>EDIT PENGGUNAAN</title>
	</head>
	<body>
		<div align="center">
			<form action="" method="post">
				<h2>EDIT DATA PENGGUNAAN</h2>
				<table>
					<?php 
	                    $id = $_GET['id'];    
	    
	                    $penggunaan = penggunaan("SELECT a.id, a.start_date, b.nm_brg, c.nama_divisi, d.username FROM penggunaan a INNER JOIN barang b INNER JOIN divisi c INNER JOIN user d on (a.kode_brg=b.kode_brg) AND (a.id_divisi=c.id_divisi) AND (a.id_user=d.id_user) WHERE id='$id'");
						
	                    foreach ($penggunaan as $tampil): 
	                ?>
					<tr>
						<input type="hidden" name="id" value="<?= $tampil["id"]; ?>">
					</tr>
					<tr>
						<td>Start Date</td>
						<td>: <input type="date" name="date" value="<?= $tampil["start_date"]; ?>"required></td>
					</tr><?php endforeach; ?>
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
						</td>
					</tr>
					
				</table>
				
				<input type="submit" name="submit" value="Edit Data Penggunaan">
			</form>
			<button onclick="window.location='http://localhost/inventory/penggunaan/index.php'">Batal</button>
		</div>
	</body>
</html>
<?php
	}else{
		//gagal login
		die ("<h3 align='center'>Maaf, anda belum login. Klik <a href='../index.php'>di sini</a> untuk login</h3>");
	}
?>