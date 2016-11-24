<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone'])       ||
   empty($_POST['address1'])    ||
   empty($_POST['city'])        ||   
   empty($_POST['province'])    ||
   empty($_POST['postalCode'])  ||
   empty($_POST['datePicker'])  ||
   empty($_POST['binSize'])     ||   
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$address1 = strip_tags(htmlspecialchars($_POST['address1']));
$address2 = strip_tags(htmlspecialchars($_POST['address2']));
$city = strip_tags(htmlspecialchars($_POST['city']));
$province = strip_tags(htmlspecialchars($_POST['province']));
$postalCode = strip_tags(htmlspecialchars($_POST['postalCode']));
$binSize = strip_tags(htmlspecialchars($_POST['binSize']));
$datePicker = strip_tags(htmlspecialchars($_POST['datePicker'])); 
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'info@dumpitbins.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "**ORDER** from:  $name";
$email_body = "You have received a new order from dumpitbins.com.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nAddress: $address1\n\nAdress: $address2\n\nCity: $city\n\nProvince $province\n\nPostalCode: $postalCode\n\nBin Size: $binSize\n\nDelivery: $datePicker\n\nMessage:\n$message";
$headers = "From: noreply@dumpitbins.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
header("Location: http://dumpitbins.com/thank-you.html");
die();
?>