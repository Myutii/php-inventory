<?php
	include("konek.php");
	session_start();

	function setFlash($pesan, $aksi, $tipe){
		$_SESSION['flash']=[
			'pesan'=> $pesan,
			'aksi'=> $aksi,
			'tipe'=> $tipe,
		];
	}

	function flashLogin()
	{
		if( isset($_SESSION['flash'])){
			echo '<div style="color: '.$_SESSION['flash']['tipe'].'">
					'.$_SESSION['flash']['pesan'].'<strong> '.$_SESSION['flash']['aksi'].'</strong>
					
				  </div>';
		}

		unset($_SESSION['flash']);
	}

	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$tampil=mysqli_query($con,"SELECT * FROM user WHERE username='$user'");
		$isi=mysqli_fetch_array($tampil);

		//cek login
		if($user==$isi['username']&&$pass==$isi['password']){
			//create session
			$_SESSION['login']=$user;
			//ke halaman cek session
			header('Location:hlmnutama.php');
			
		}else{
			setFlash('Username atau Password','salah!','red');
			header('Location: index.php');
			exit;
		}
	} 
?>
		<html>
		<head>
			<title>LOGIN</title>
		</head>
		<body>
			<div align="center">
				<form action="" method="post">
					<h2>LOGIN</h2>
					<table>
						<?php flashLogin(); ?>
						<tr>
							<td>Username</td> 
							<td>: <input type="text" name="user" required></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>: <input type="password" name="pass" required></td>
						</tr>
					</table>
					<input type="submit" name="login" value="LOGIN">
				</form>
			</div>
		</body>
		</html>
	