<?php

include 'dbcon.php';
error_reporting(E_ALL ^ E_WARNING);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$country_code = $_POST['country_code'];
$phone = $_POST['phone'];
$state = $_POST['state'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];

$customer_id = uniqid(C);


$n=8;
function password_generation($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$password = password_generation($n);

$sql = "INSERT INTO customer_signup (customer_id, first_name, last_name, email, country_code , phone, state, district, pincode, password) VALUES ('$customer_id' , '$first_name' , '$last_name' , '$email' ,'$country_code' , '$phone' , '$state' , '$district' , '$pincode' , '$password')";


if (mysqli_query($conn, $sql)) {
   echo '<script>alert("Registration Successful.The Username and Password has been mailed ")</script>';
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



$sql2= "SELECT email , password FROM customer_signup WHERE `email` ='$email'";
$query2 = mysqli_query($conn, $sql2);

		$row=mysqli_fetch_array($query2);
		$password=$row["password"];
		$email=$row["email"];
		$subject="FarmToFridge.in - Password Request";
		$header="From: qwerty.sih2020@gmail.com";
		$content="Your password is ".$password;


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
    $mail->Body = "$password";
    $mail->AddAddress("$email");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        header('Location: customer_login.html');
     }

mysqli_close($conn);
?>
