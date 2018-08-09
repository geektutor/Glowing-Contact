<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   include "../vendor/autoload.php";
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'sodiq.akinjobi@gmail.com'; // Add your email address inbetween the '' replacing you@domain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: sodson11@gmail.com\n;"; // This is the email address the generated message will be from. We recommend using something like noreply@domain.com.
$headers .= "Reply-To: $email_address";   
//mail($to,$email_subject,$email_body,$headers);//scrap this, call my mail stuff
$mailer = new RegMail();
$mailer->from = "no-reply@you.com";//a valid from email
$mailer->from_name = "";//from name
$mailer->host = "";//your host url
$mailer->username = "you@you.com";//replace with your email address
$mailer->password = "password";
$mailer->subject = $email_subject;
$mailer->build();
$mail->add_header($headers);
$mailer->set_body($email_body,$email_body);//second arg is for non html mails

$mailer->send_to($to);
//store contact in array for the procezzing
//pattern "name,email,subject,body"
$del = ',';
$detail = $name.$del.$email.$del.$email_subject.$del.$email_body;
	$file = fopen("contact_data.csv","a");
	fputcsv($file,explode($del,$detail));
fclose($file);

return true;         
?>
