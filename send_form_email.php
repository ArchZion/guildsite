<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "theosteenekamp@gmail.com";
 
    $email_subject = "Application from Warmongers Website";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name_surname']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['armory_link']) ||
 
        !isset($_POST['class_spec']) ||

		!isset($_POST['logs_recent']) ||

		!isset($_POST['ui_current']) ||

		!isset($_POST['professions']) ||

		!isset($_POST['battletag']) ||
 
        !isset($_POST['intro_to_self'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }

	$name_surname = $_POST['name_surname']; // required

	$profession = $_POST['professions']; // required

	$armory_link = $_POST['armory_link']; // required
 
     $class_spec = $_POST['class_spec']; // required
 
    $logs_recent = $_POST['logs_recent']; // required
 
    $ui_current = $_POST['ui_current']; // required
 
    $email_from = $_POST['email']; // required
 
    $battletag = $_POST['battletag']; // not required
 
    $intro_to_self = $_POST['intro_to_self']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name_surname)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>



<!-- include your own success html here -->



Thank you for contacting us. We will be in touch with you very soon.



<?php
 
}
 
?>