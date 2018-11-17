<?php

function create_connection() {
	$servername = "mysql";
	$username = "admin";
	$password = "admin";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password) or die("Connection failed: " . $conn->connect_error);

	echo "Connected successfully";

	return $conn;
}

function register_user($name, $username, $password, $conf_password) {
	$conn = create_connection();
	$database = 'pocs_security';

	if ($password != $conf_password) {
		return false;
	} 

	$sql = "INSERT INTO user (name, username, password) 
    VALUES ('$name', '$username', '$password')";

    mysqli_select_db($conn, $database);

    if (!mysqli_query($conn, $sql)) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    return true;
}
?>