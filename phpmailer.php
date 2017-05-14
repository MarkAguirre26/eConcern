<?php 



include_once("init.php");
require 'PHPMailer/PHPMailerAutoload.php';

$ID = $_POST['ID'];
$V_code = randomGen(1000,5000,0);
//$Email_ = $_GET['user_email'];
//$pwd = $_GET['pwd'];
$to = $_POST['to'];


$query_insert ="call sp_code('$ID','$V_code','$to')";
$result_insert = mysqli_query($con,$query_insert);


	if($result_insert){
		
	
		echo "Sent!";
		
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587; //465 or 587
		$mail->IsHTML(true);
		$mail->Username = "markaguirre26@gmail.com";
		$mail->Password = "sommerson26";
		$mail->SetFrom("markaguirre26@gmail.com","AppName");
		$mail->Subject = "Password recovery";
		$mail->Body = $V_code;
		$mail->AddAddress($to);
		
 	if(!$mail->Send()) {
   		 echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
   		 echo "Message has been sent";
 	 }
 	 

	}else{
		echo "Failed!";
	}






function randomGen($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    //return array_slice($numbers, 0, $quantity);
    return $numbers[0];
}
//print_r(randomGen(1000,5000,0)); 






?>