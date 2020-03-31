<?php
include 'dbcon.php';
$email = $_SESSION['email'];

$sql = "SELECT SUM(total) as sum FROM add_to_cart WHERE email = '$email' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$_SESSION['subtotal'] = $row['sum'];
$delivery_fee = '10';

$sql1 = "SELECT SUM(quantity) as total_quantity FROM add_to_cart WHERE email = '$email' ";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$total_quantity = $row1['total_quantity'];

$delivery_fee = intval($total_quantity) * intval($delivery_fee);
$_SESSION['delivery_fee'] = $delivery_fee;

$grand_total = intval($_SESSION['subtotal']) + intval($delivery_fee);
$_SESSION['grand_total'] = $grand_total;

$sql1 = "SELECT customer_id FROM customer_signup WHERE email = '$email'";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result1);
$_SESSION['customer_id'] = $row['customer_id'];

?>