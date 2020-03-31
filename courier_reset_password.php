<?php
include 'dbcon.php';
error_reporting(E_ALL ^ E_WARNING); 
$email = $_POST['email'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];

$sql = "SELECT * FROM courier_login WHERE email = '$email' && 'password = '$password'";
$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

if($count = 1)
{
	if($new_password == $confirm_new_password)
	{
		$sql2 = "UPDATE courier_login SET password = '$new_password' WHERE email = '$email'";
		if(mysqli_query($conn, $sql2))
		{
			echo '<script>alert("Password Updated")</script>';
			include 'courier_login.html';
		}else{
			echo '<script>alert("Error")</script>';
		}
	}else{
		echo '<script>alert("New Password and Confirm New Password do not match")</script>';	
	}
}else{
	echo '<script>alert("Email and Old Password do not match")</script>';	
}

?>