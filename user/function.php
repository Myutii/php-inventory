<?php	
	function user($query){
		global $con;
		$result = mysqli_query($con,$query);
		$rows = [];
		while ($row = mysqli_fetch_array($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambahUser($data){
		global $con;
		//ambil data
    	$username = htmlspecialchars($data["username"]);
    	$password = htmlspecialchars($data["password"]);
    	
    	//query
    	$query = "INSERT INTO user VALUES ('','$username','$password')";
    	mysqli_query($con,$query);

    	return mysqli_affected_rows($con);
	}

	function hapusUser($data){
		global $con;
		$id = htmlspecialchars($data["id"]);
		$query = "DELETE FROM user WHERE id_user = '$id'";
		mysqli_query($con,$query);

		return mysqli_affected_rows($con);
	}
?>
