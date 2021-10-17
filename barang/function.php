<?php	
	function barang($query){
		global $con;
		$result = mysqli_query($con,$query);
		$rows = [];
		while ($row = mysqli_fetch_array($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambahBarang($data){
		global $con;
		//ambil data
    	$nama = htmlspecialchars($data["nama"]);
    	$jenis = htmlspecialchars($data["jenis"]);
    	$ket = htmlspecialchars($data["ket"]);

    	//query
    	$query = "INSERT INTO barang VALUES ('','$nama','$jenis','$ket')";
    	mysqli_query($con,$query);

    	return mysqli_affected_rows($con);
	}

	function editBarang($data){
		global $con;
		//ambil data
    	$id = htmlspecialchars($data["id"]);
    	$nama = htmlspecialchars($data["nama"]);
    	$jenis = htmlspecialchars($data["jenis"]);
    	$ket = htmlspecialchars($data["ket"]);
    	//query
    	$query = "UPDATE barang SET nm_brg='$nama' , jenis_brg='$jenis' , ket='$ket' WHERE kode_brg='$id'";
    	mysqli_query($con,$query);

    	return mysqli_affected_rows($con);
	}

	function hapusBarang($data){
		global $con;
		$id = htmlspecialchars($data["id"]);
		$query = "DELETE FROM barang WHERE kode_brg = '$id'";
		mysqli_query($con,$query);

		return mysqli_affected_rows($con);
	}
?>
