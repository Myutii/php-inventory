<?php
	$con=mysqli_connect('localhost','root','','inventory');
	if($con){
	}else{
		die("<h1 align='center'>SERVER DIDN'T CONNECT</h1>");
	}

	function divisi($query){
		global $con;
		$result = mysqli_query($con,$query);
		$rows = [];
		while ($row = mysqli_fetch_array($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambahDivisi($data){
		global $con;
		//ambil data
    	$nama = htmlspecialchars($data["nama"]);

    	//query
    	$query = "INSERT INTO divisi VALUES ('','$nama')";
    	mysqli_query($con,$query);

    	return mysqli_affected_rows($con);
	}

	function editDivisi($data){
		global $con;
		//ambil data
    	$id = htmlspecialchars($data["id"]);
    	$nama = htmlspecialchars($data["nama"]);
    	//query
    	$query = "UPDATE divisi SET nama_divisi = '$nama' WHERE id_divisi = '$id'";
    	mysqli_query($con,$query);

    	return mysqli_affected_rows($con);
	}

	function hapusDivisi($data){
		global $con;
		$id = htmlspecialchars($data["id"]);
		$query = "DELETE FROM divisi WHERE id_divisi = '$id'";
		mysqli_query($con,$query);

		return mysqli_affected_rows($con);
	}
?>