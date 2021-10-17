<?php
	session_start();
	if(isset($_SESSION['login'])){
	require 'koneksi.php';
	require 'function.php';
	if(isset($_POST["submit"])){
	    	if(hapusPenggunaan($_POST) > 0){
	            header('Location: http://localhost/inventory/penggunaan/index.php');
	            exit;
	        }else{
	            header('Location: http://localhost/inventory/penggunaan/index.php');
	            exit;
	        }
	    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hapus Divisi</title>
</head>
<body>
	<div align="center">
		<br>
		<br>
		<br>
		<form action="" method="post">    
	        <?php 
	            $id = $_GET['id'];    

	            $penngunaan = penggunaan("SELECT * FROM penggunaan WHERE id='$id'");
	            foreach ($penngunaan as $tampil): 
	        ?>  
	        <label>Anda yakin ingin menghapus penggunaan <?= $tampil["id"]; ?> ?</label>
	        <input type="hidden" name="id" value="<?= $tampil["id"]; ?>">
	        <?php 
	    		endforeach; 
	    	?>
	    	<br><br>
	        <button type="submit" name="submit" class="btn btn-success">Hapus</button>
	    </form>
	    <button onclick="window.location='http://localhost/inventory/penggunaan'">Batal</button>
	</div>	
</body>
</html>
<?php
	}else{
		//gagal login
		die ("<h3 align='center'>Maaf, anda belum login. Klik <a href='../index.php'>di sini</a> untuk login</h3>");
	}
?>