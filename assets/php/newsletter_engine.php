<?php
/*
From http://www.html-form-guide.com 
This is the simplest emailer one can have in PHP.
If this does not work, then the PHP email configuration is bad!
*/

$firstName = "";
$lastName = "";
$email = "";

$message = "";

$thank_you_url = "http://dev.drpharm-usa.com/products/RFQ/successful_form.html";
$error_url = "http://dev.drpharm-usa.com/products/RFQ/error.html";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstName = test_input($_POST["fnameInput"]);
	$lastName = test_input($_POST["lnameInput"]);
	$email = test_input($_POST["emailInput"]);
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data; 
}

$message .= "First Name: " . $firstName . "\n"; 
$message .= "Last Name: " . $lastName  ."\n"; 
$message .= "Email: " . $email . "\n";

//EMAIL DATA 
$from_add = "webmaster@drpharm-usa.com"; $to_add = "sales@drpharm-usa.com"; //<-- put your yahoo/gmail email address here
$subject = "[NEWSLETTER] - A New Lead has signed up for the Dr. Pharm Newsletter!";

$headers = "From: $from_add \r\n";
$headers .= "Reply-To: $from_add \r\n";
$headers .= "Return-Path: $from_add\r\n";
$headers .= "X-Mailer: PHP \r\n";

if(mail($to_add,$subject,$message,$headers)) {
	} else {
		     //Open txt file for testing purposes 
		$leadFile = fopen("../newLead2.txt", "w") or die("Unable to open file!");
    	fwrite($leadFile, $message);
    	fclose($leadFile);
	}
		header('Location: ' . $thank_you_url);

?>