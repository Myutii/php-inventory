<?php
	session_start();
	if(isset($_SESSION['login'])){
	require 'koneksi.php';

	if(isset($_POST["submit"])){
	    	if(hapusDivisi($_POST) > 0){
	            header('Location: http://localhost/inventory/divisi/index.php');
	            exit;
	        }else{
	            header('Location: http://localhost/inventory/divisi/index.php');
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

	            $divisi = divisi("SELECT * FROM divisi WHERE id_divisi='$id'");
	            foreach ($divisi as $tampil): 
	        ?>  
	        <label>Anda yakin ingin menghapus divisi <?= $tampil["nama_divisi"]; ?> ?</label>
	        <input type="hidden" name="id" value="<?= $tampil["id_divisi"]; ?>">
	        <?php 
	    		endforeach; 
	    	?>
	    	<br><br>
	        <button type="submit" name="submit" class="btn btn-success">Hapus</button>
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