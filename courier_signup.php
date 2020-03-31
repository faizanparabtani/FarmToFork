<?php

include 'dbcon.php';
error_reporting(E_ALL ^ E_WARNING);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$country_code = $_POST['country_code'];
$phone = $_POST['phone'];
$aadhaar_no = $_POST['aadhaar_no'];
$pan_card_no = $_POST['pan_card_no'];
$state = $_POST['state'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$mode_of_communication = $_POST['mode_of_communication'];
$driver_licence_no = $_POST['driver_licence_no'];
$vehicle_insuarance = $_POST['vehicle_insuarance'];
$age = $_POST['age'];

$courier_id = uniqid(CO);


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

$sql = "INSERT INTO courier_login (courier_id, first_name, last_name, email, country_code , phone, aadhaar_no, pan_card_no, state, district, pincode, mode_of_communication, driver_licence_no, vehicle_insuarance, age , password) VALUES ('$courier_id' , '$first_name' , '$last_name' , '$email' ,'$country_code' , '$phone' , '$aadhaar_no' , '$pan_card_no' , '$state' , '$district' , '$pincode' , '$mode_of_communication' , '$driver_licence_no' , '$vehicle_insuarance' , '$age' , '$password')";


if (mysqli_query($conn, $sql)) {
   echo '<script>alert("Registration Successful.The Username and Password has been mailed ")</script>';
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



$sql2= "SELECT email , password FROM courier_login WHERE `email` ='$email'"; 
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
    $mail->Password = "QWERTY@sih2020";
    $mail->SetFrom("qwerty.sih2020@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "$password";
    $mail->AddAddress("$email");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        include 'courier_login.html';
     }

mysqli_close($conn);
?>