<?php
session_start();
$count = 0;
include 'dbcon.php';

$email = $_POST['email1'];
$password = $_POST['password'];

$sql = "SELECT * FROM courier_login WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if ($count = 1) {
	echo '<script>alert("Login Successful")</script>';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['email'] = $_POST['email1'];
        $_SESSION['courier_id'] = $row['courier_id'];
        if($_SESSION['email']){
            header('location: courier_dashboard.php');
        }
    }   	
}else{
	echo '<script>alert("Login Unsuccessful")</script>';
	header('location: courier_login.html');	
}
?>