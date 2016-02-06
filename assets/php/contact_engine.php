<?php
//Define Variables & Set to Empty Values
	$firstName = "";
	$lastName = "";
	$email = "";
	$phoneNumber = "";
	$companyName = "";
	$reasonMessage = "";
	$customerMessage = "";
	$message = ""; 

	
    $thank_you_url = "../../products/RFQ/successful_form.html";
    $error_url = "../../products/RFQ/error.html";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $firstName = test_input($_POST["fnameInput"]);
			$lastName = test_input($_POST["lnameInput"]);
			$email = test_input($_POST["emailInput"]);
			$phoneNumber = test_input($_POST["phonenumberInput"]); 
		    $companyName = test_input($_POST["compnameInput"]);
			

			$reasonMessage = test_input($_POST["reasonInput"]); 
		
			$customerMessage = test_input($_POST["messageInput"]);  
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data; 
	}
	/*
	fwrite($leadFile, "First Name: " . $firstName . "\n");
	fwrite($leadFile, "Last Name: " . $lastName  ."\n");
	fwrite($leadFile, "Email: " . $email . "\n");
	fwrite($leadFile, "Phone Number: " . $phoneNumber . "\n");
	fwrite($leadFile, "Company: " . $companyName . "\n");
	fwrite($leadFile, "Title: " . $title . "\n");
	fwrite($leadFile, "Address: " . $address . "\n");
	fwrite($leadFile, "City: " . $city . "\n");
	fwrite($leadFile, "State: " . $state . "\n");
    fwrite($leadFile, "\n");
	fwrite($leadFile, "Models Intrested In: " . $selectedModel . "\n");	
	fwrite($leadFile, "Desired Output Rate: ". $rateValue . " Capsules Per " . $rateLabel . "\n");	
	fwrite($leadFile, "Filling Accuracy: " . $accuracy . " %\n" );	
	fwrite($leadFile, "Using Pre-Printed Capsules: " . $prePrintBool . "\n");	
	fwrite($leadFile, "Primary Tooling Size: " . $primaryToolSize . "\n");	
	fwrite($leadFile, "Primary Dosing Disk Thickness: " . $dosingdiskThick . " mm \n");
	fwrite($leadFile, "Additional Tooling Required: " . $additToolBool . "\n");
	fwrite($leadFile, "Capsule Polisher Needed: " . $capPolishBool . "\n");
	fwrite($leadFile, "Vacuum Pump Needed: " . $vacPumpBool . "\n"); 
	fwrite($leadFile, "Dust Collector Needed: " . $dustColBool . "\n");
	fwrite($leadFile, "Vacuum Loader Needed: " . $vacLoadBool . "\n");
	fwrite($leadFile, "Product Detail: " . $productDesc . "\n");
	*/
	$message .= "First Name: " . $firstName . "\n"; 
	$message .= "Last Name: " . $lastName  ."\n"; 
	$message .= "Email: " . $email . "\n";
	$message .= "Phone Number: " . $phoneNumber . "\n"; 
	$message .= "Company: " . $companyName . "\n"; 
	$message .= "Re: " . $reasonMessage . "\n";

	$message .= "Message: " . $customerMessage . "\n";


    //EMAIL DATA 
    $from_add = "webmaster@drpharm-usa.com"; 

	$to_add = "sales@drpharm-usa.com"; //<-- put your yahoo/gmail email address here

	$subject = "[Contact-Message] - A Website Visitor Has Sent a Message";
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
 
  if(mail($to_add,$subject,$message,$headers)) 
	{
		
	} else {
		     //Open txt file for testing purposes 
		$leadFile = fopen("../newLead2.txt", "w") or die("Unable to open file!");
   		fwrite($leadFile, $message);
    	fclose($leadFile);
	}
	header('Location: ' . $thank_you_url);
    
?>