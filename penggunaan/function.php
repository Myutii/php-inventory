<?php	
	function penggunaan($query){
		global $con;
		$result = mysqli_query($con,$query);
		$rows = [];
		while ($row = mysqli_fetch_array($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambahPenggunaan($data){
		global $con;
		//ambil data
    	$date = htmlspecialchars($data["date"]);
    	$brg = htmlspecialchars($data["brg"]);
    	$div = htmlspecialchars($data["div"]);
    	$user = htmlspecialchars($data["user"]);

    	//query
    	$query = "INSERT INTO penggunaan VALUES ('','$date','$brg','$div','$user')";
    	mysqli_query($con,$query);

    	return mysqli_affected_rows($con);
	}

	function editPenggunaan($data){
		global $con;
		//ambil data
    	$id = htmlspecialchars($data["id"]);
    	$date = htmlspecialchars($data["date"]);
    	$brg = htmlspecialchars($data["brg"]);
    	$div = htmlspecialchars($data["div"]);
    	//query
    	$query = "UPDATE penggunaan SET start_date = '$date', kode_brg = '$brg', id_divisi = '$div' WHERE id = '$id'";
    	mysqli_query($con,$query);

    	return mysqli_affected_rows($con);
	}

	function hapusPenggunaan($data){
		global $con;
		$id = htmlspecialchars($data["id"]);
		$query = "DELETE FROM penggunaan WHERE id = '$id'";
		mysqli_query($con,$query);

		return mysqli_affected_rows($con);
	}
?>
