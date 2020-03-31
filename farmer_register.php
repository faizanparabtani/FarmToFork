<?php

include 'dbcon.php';
error_reporting(E_WARNING | E_NOTICE);

$first_name = $_POST['f_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$aadhaar_no = $_POST['aadhaar_no'];
$pan_card_no = $_POST['pan_card_no'];
$state = $_POST['state'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$age = $_POST['age'];


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
$farmer_id = uniqid(F);

$sql = "INSERT INTO farmer_reg (farmer_id, f_name, f_email, f_phone, aadhaar_no, pan_card_no, state, district, pincode, age , password) VALUES ('$farmer_id', '$first_name' , '$email' , '$phone' , '$aadhaar_no' , '$pan_card_no' , '$state' , '$district' , '$pincode'  , '$age' , '$password')";


if (mysqli_query($conn, $sql)) {
   echo '<script>alert("Registration Successful.The Username and Password has been mailed ")</script>';
   // include 'farmer_main_login.html';
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



$sql2= "SELECT f_email , password FROM farmer_reg WHERE `f_email` ='$email'";
$query2 = mysqli_query($conn, $sql2);

		$row=mysqli_fetch_array($query2);
		$password=$row["password"];
		$email=$row["f_email"];
		$subject="Verbazon.net - Password Request";
		$header="From: qwerty.sih2020@gmail.com";
		$content="Your password is ".$password;


	require("phpmailer/class.PHPMailer.php");
  	require("phpmailer/class.SMTP.php");
  	require("phpmailer/PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->CharSet="UTF-8";
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";

    $mail->IsHTML(true);

    $mail->SMTPAuth = true; // authentication enabled
    $mail->Port = 465; // or 587

    $mail->Username = "qwerty.sih2020@gmail.com";
    $mail->Password = "";
    $mail->SetFrom("qwerty.sih2020@gmail.com");
    $mail->Subject = "$farmer_id";
    $mail->Body = "$password";
    $mail->AddAddress("$email");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo '<script>alert("Email with password has been send to your email")</script>';
     }
    header("Location: farmer_login.html" );

$apiKey = urlencode('E4GV++pRNXA-Azk2mx2PIHKVsJ7mBejDrV9RGhV0Ts');
$numbers = (int)$phone;
$sender = urlencode('TXTLCL');
$message = rawurlencode('Farmer Id: '.$farmer_id.'\n Password: '.$password);
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

mysqli_close($conn);
?>
