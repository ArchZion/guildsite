<?php
// Check for empty fields
if(empty($_POST['name_surname'])  		||
   empty($_POST['email']) 		||
   empty($_POST['armory_link']) 		||
   empty($_POST['class_spec'])	||
    empty($_POST['logs_recent'])	||
	 empty($_POST['ui_current'])	||
	  empty($_POST['professions'])	||
	   empty($_POST['battletag'])	||
	    empty($_POST['intro_to_self'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name_surname'];
$email = $_POST['email'];
$armory = $_POST['armory_link'];
$spec = $_POST['class_spec'];
$logs = $_POST['logs_recent'];
$uitlink = $_POST['ui_current'];
$profession = $_POST['professions'];
$battletag = $_POST['battletag'];
$introduction = $_POST['intro_to_self'];
	
// Create the email and send the message
$to = 'theosteenekamp@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Warmongers Website Application:  $name";
$email_body = "You have received a new Application from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail Address: $email\n\nArmory Link: $armory\n\nClass Spec:$spec \n\nLogs: $logs \n\nUI Link: $uitlink \n\nProfession: $profession \n\nBattletag: $battletag \n\nIntro to Self: $introduction";
$headers = "From: $email\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);
echo "Thank You!, We will be in touch as soon as possible.";
return true;	

?>
