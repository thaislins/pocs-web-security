<?php

function create_connection() {
	$servername = "mysql";
	$username = "admin";
	$password = "admin";
	$database = 'pocs_security';

	// Create connection
	$conn = mysqli_connect($servername, $username, $password) or die("Connection failed: " . $conn->connect_error);
	mysqli_select_db($conn, $database);

	return $conn;
}

function register_user($name, $username, $password, $conf_password) {
	if ($password != $conf_password) {
		return 'Passwords don\'t match';
	}

	$sql = "INSERT INTO user (name, username, password) VALUES ('$name', '$username', '$password')";

	$conn = create_connection();
	$query_exec = mysqli_query($conn, $sql);
	$error_msg = $query_exec ? '' : mysqli_error($conn) . "<br>Query: $sql";
	mysqli_close($conn);

	return $error_msg;
}

function user_login($username, $password) {
	$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

	$conn = create_connection();
	$check = mysqli_query($conn, $sql) or die("erro ao selecionar");
	$error_msg = mysqli_num_rows($check) <= 0 ? 'Invalid user or password' : '';
	mysqli_close($conn);

	return $error_msg;
}
