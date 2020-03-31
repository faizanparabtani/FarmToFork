<?php
session_start();

include 'dbcon.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM courier_login WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$courier_id = $row['courier_id'];
$order_id = $_POST['order_id'];
$verification_code = $_POST['verification_code'];

$sql2 = "SELECT * FROM orders_in_process WHERE courier_id = '$courier_id' AND order_id = '$order_id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
$verification_code2 = $row2['verification_code'];

if ($verification_code = $verification_code2) {
	$sql3 = "SELECT * FROM courier_pending_orders WHERE order_id LIKE '$order_id'";
	$result3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_array($result3);
	$courier_email = $row3['courier_email'];
	$vegetable_list = $row3['vegetable_list'];
	$total_quantity = $row3['total_quantity'];
	$grand_total = $row3['grand_total'];

	$sql4 = "SELECT * FROM courier_login WHERE email = '$courier_email'";
	$result4 = mysqli_query($conn, $sql4);
	$row4 = mysqli_fetch_array($result4);
	$courier_id = $row4['courier_id'];

	$sql5 = "INSERT INTO courier_completed_orders(order_id,courier_id,vegetable_list,total_quantity,grand_total) VALUES('$order_id' , '$courier_id' , '$vegetable_list' , '$total_quantity' , '$grand_total')";
	if(mysqli_query($conn, $sql5)){
		$sql6 = "DELETE FROM courier_pending_orders WHERE order_id='$order_id'";
		if(mysqli_query($conn, $sql6)) {
				header('Location: courier_completed_orders.php');
			}else {
				echo "<script>alert('Verification Unsuccessful')</script>";
				header('Location: courier_pending_orders.php');
			}

	}else {
		echo "<script>alert('Verification Unsuccessful')</script>";
		header('Location: courier_pending_orders.php');
}
}else {
	echo "<script>alert('Verification Unsuccessful')</script>";
	header('Location: courier_pending_orders.php');
}

?>
