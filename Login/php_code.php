<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'prototype');

	// initialize variables
	$name = "";
	$email = "";
    $usertype = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
        $usertype = $_POST['user_type'];

		mysqli_query($db, "INSERT INTO login (name, email, user_type) VALUES ('$name', '$email', $usertype)"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: editaccounts.php');
    ?>