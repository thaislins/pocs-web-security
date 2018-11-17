<?php

function create_connection() {
	$servername = "mysql";
	$username = "admin";
	$password = "admin";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password) or die("Connection failed: " . $conn->connect_error);

	return $conn;
}

function register_user($name, $username, $password, $conf_password) {
	$conn = create_connection();
	$database = 'pocs_security';

	if ($password != $conf_password) {
		return 'Passwords don\'t match';
	}

	$sql = "INSERT INTO user (name, username, password) VALUES ('$name', '$username', '$password')";

  mysqli_select_db($conn, $database);

  $query_exec = mysqli_query($conn, $sql);
  $errors = mysqli_error($conn);
  mysqli_close($conn);

  return $query_exec ? '' : "Error on $sql<br>$errors";
}

function user_login($username, $password) {
	$conn = create_connection();
	$database = 'pocs_security';

	$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    mysqli_select_db($conn, $database);
    $check = mysqli_query($conn, $sql) or die("erro ao selecionar");

    if (mysqli_num_rows($check) <= 0) {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

    mysqli_close($conn);
    return true;
}
