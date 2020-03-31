<?php
session_start();
$count = 0;
include 'dbcon.php';
// include 'farmer_dashboard.php';

$farmer_id = $_POST['farmer_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM farmer_reg WHERE farmer_id = '$farmer_id' AND password = '$password'";
$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

if ($count == 1) {
	echo '<script>alert("Login Successful")</script>';
 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	        $_SESSION['name'] = $_POST['farmer_id'];
	        if($_SESSION['name']) {
	            header('location: dashboard.php');
	        }
	    }
}else
{
	echo '<script>alert("Login Unsuccessful")</script>';
}
?>
