<?php
	session_start();
	if(isset($_SESSION['login'])){
	include("../konek.php");
	require 'function.php';

	if(isset($_POST["submit"])){
	    	if(hapusUser($_POST) > 0){
	            header('Location: http://localhost/inventory/user/index.php');
	            exit;
	        }else{
	            header('Location: http://localhost/inventory/user/index.php');
	            exit;
	        }
	    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hapus User</title>
</head>
<body>
	<div align="center">
		<br>
		<br>
		<br>
		<form action="" method="post">    
	        <?php 
	            $id = $_GET['id'];    

	            $user = user("SELECT * FROM user WHERE id_user='$id'");
	            foreach ($user as $tampil): 
	        ?>  
	        <label>Anda yakin ingin menghapus user <?= $tampil["username"]; ?> ?</label>
	        <input type="hidden" name="id" value="<?= $tampil["id_user"]; ?>">
	        <?php 
	    		endforeach; 
	    	?>
	    	<br><br>
	        <button type="submit" name="submit" class="btn btn-success">Hapus</button>
	    </form>
	    <button onclick="window.location='http://localhost/inventory/user/index.php'">Batal</button>
	</div>	
</body>
</html>
<?php
	}else{
		//gagal login
		die ("<h3 align='center'>Maaf, anda belum login. Klik <a href='../index.php'>di sini</a> untuk login</h3>");
	}
?>