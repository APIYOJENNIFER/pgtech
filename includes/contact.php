<?php

if (isset($_POST['submit'])){
	include_once 'dbh.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$message = mysqli_real_escape_string($conn, $_POST['message']);

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($message)) {
		header("Location: ../contact.html?submit=empty");
		exit();
	}else{
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../contact.html?submit=invalid");
			exit();
		}else{
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../contact.html?submit=email");
				exit();

			}else{
				//Insert information into the database
				$sql = "INSERT INTO posts (user_first, user_last, user_email, user_msg) VALUES ('$first', '$last', '$email', '$message');";
				mysqli_query($conn, $sql);
				header("Location: ../contact.html?submit=success");
				exit();
			}
		}
	}
}else{
	header("Location: ../contact.html");
	exit();
}