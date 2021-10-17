<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("koneksi.php"); 
	if(isset($_POST["submit"])){
    	if(editDivisi($_POST) > 0){
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
		<title>EDIT DIVISI</title>
	</head>
	<body>
		<div align="center">
			<form action="" method="post">
				<h2>EDIT DATA DIVISI</h2>
				<table>
					<?php 
	                    $id = $_GET['id'];    
	    
	                    $divisi = divisi("SELECT * FROM divisi WHERE id_divisi=$id");
	                    foreach ($divisi as $tampil): 
	                ?>
					<tr>
						<input type="hidden" name="id" value="<?= $tampil["id_divisi"]; ?>">
					</tr>
					<tr>
						<td>NAMA DIVISI</td>
						<td>: <input type="text" name="nama" value="<?= $tampil["nama_divisi"]; ?>"></td>
					</tr>
					<?php endforeach; ?>
				</table>
				
				<input type="submit" name="submit" value="Edit Divisi">
			</form>
			<button onclick="window.location='http://localhost/inventory/divisi/index.php'">Batal</button>
		</div>
	</body>
</html>
<?php
	}else{
		//gagal login
		die ("<h3 align='center'>Maaf, anda belum login. Klik <a href='../index.php'>di sini</a> untuk login</h3>");
	}
?>