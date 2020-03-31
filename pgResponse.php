<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "TRUE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {

	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		include 'dbcon.php';
		$email = $_SESSION['email'];
		$order_id = $_SESSION['order_id'];
		$customer_id = $_SESSION['customer_id'];
		$delivery_address = $_SESSION['delivery_address'];
		$vegetable_list = $_SESSION['vegetable_list'];
		$total_quantity = $_SESSION['total_quantity'];
		$grand_total = $_SESSION['grand_total'];

		$sql1 = "INSERT INTO customer_order_details(order_id,customer_id,delivery_address,vegetable_list,total_quantity,grand_total) VALUES('$order_id' , '$customer_id' , '$delivery_address' , '$vegetable_list' , '$total_quantity' , '$grand_total') ";
		$result1 = mysqli_query($conn, $sql1);
		$sql2 = "DELETE FROM add_to_cart WHERE email = '$email'";
		$result2 = mysqli_query($conn, $sql2);

		$content = nl2br("Heyy,\r\n").
		nl2br("Thank You for ordering from FarmToFridge.in \r\n").
		nl2br("Your order id is :".$order_id."\r\n").
		nl2br("List :".$vegetable_list."\r\n").
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
    	$mail->Password = "QWERTY@sih2020";
    	$mail->SetFrom("qwerty.sih2020@gmail.com");
    	$mail->Subject = "Order Placed Successfully";
    	$mail->Body = "$content";
    	$mail->AddAddress("$email");

     	if(!$mail->Send()) {
        	echo "Mailer Error: " . $mail->ErrorInfo;
     	} else {
        header('Location: customer_dashboard.php');
    }


	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>