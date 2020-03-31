<?php
session_start();
$email = $_SESSION['email'];
$delivery_address = $_POST['delivery_address'];
$_SESSION['delivery_address'] = $delivery_address;
$order_id = $_POST['ORDER_ID'];
$_SESSION[$order_id] = $order_id;
$customer_id = $_POST['ORDER_ID'];
$_SESSION[$customer_id] = $customer_id;
$grand_total = $_SESSION['grand_total'];
include 'dbcon.php';
$list = 'Items :';
$total_quantity = '0';
$sql = "SELECT v_name , quantity FROM add_to_cart WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	$list = "$list".nl2br($row['v_name']." (".$row['quantity']." kgs) ");
	$total_quantity = intval($total_quantity) + intval($row['quantity']);
}
$_SESSION['vegetable_list'] = $list;


$content = nl2br("Heyy,\r\n").
		   nl2br("Thank You for ordering from FarmToFridge.in \r\n").
			nl2br("Your order id is :".$order_id."\r\n").
			nl2br($list."\r\n").
			nl2br("Your total : ".$grand_total."\r\n").
			nl2br("The order will be delivered within 24 hours. \r\n").
			nl2br("We hope to seeing you again. \r\n");

  require("phpmailer/class.PHPMailer.php");
  require("phpmailer/class.SMTP.php");
  require("phpmailer/PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->CharSet="UTF-8";
    $mail->SMTPDebug = 0; //debugging: 0 = to remove 1 = errors and messages, 2 = messages only
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";

    $mail->IsHTML(true);

    $mail->SMTPAuth = true; // authentication enabled
    $mail->Port = 465; // or 587

    $mail->Username = "qwerty.sih2020@gmail.com";
    $mail->Password = "";
    $mail->SetFrom("qwerty.sih2020@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "$content";
    $mail->AddAddress("$email");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        header('Location: customer_dashboard.php');
    }
?>
