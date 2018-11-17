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
	$check = mysqli_query($conn, $sql) or die("select error");
	$error_msg = mysqli_num_rows($check) <= 0 ? 'Invalid user or password' : '';
	mysqli_close($conn);

	return $error_msg;
}

function select_user_id($username) {
	$select_id = "SELECT id FROM user WHERE username='$username'";

	$conn = create_connection();
	$result = mysqli_query($conn, $select_id) or die("select error");

	
	if(mysqli_num_rows($result) > 0 ){
		$row = mysqli_fetch_assoc($result);
		$user_id =  $row['id'];
		return $user_id;
	}


	//$sql = "INSERT INTO comment (user_id, comment) VALUES ('$user_id', '$comment')";
	//$query_exec = mysqli_query($conn, $sql);
	//$error_msg = $query_exec ? '' : mysqli_error($conn) . "<br>Query: $sql";
	mysqli_close($conn);
}

function post_comment($user_id, $comment) {
	$sql = "INSERT INTO comment (user_id, comment) VALUES ('$user_id', '$comment')";

	$conn = create_connection();
	$query_exec = mysqli_query($conn, $sql);
	$error_msg = $query_exec ? '' : mysqli_error($conn) . "<br>Query: $sql";
	mysqli_close($conn);

	return $error_msg;
}
