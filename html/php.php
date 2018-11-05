<?php

$fname = $_POST['first_name'];
$sname = $_POST['surname'];
$email = test_input($_POST['email']);
$comment = $_POST['text'];

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$emailErr = 'Invalid email format';
}

/*if($fname && $sname && $email && $comment){
	echo 'testing';
}
else{
	echo 'wrong input';
}*/

?>