<?php
//Define Variables & Set to Empty Values
	$firstName = "";
	$lastName = "";
	$email = "";
	$phoneNumber = "";
	$companyName = "";
	$title = "";
	$address = "";
	$city = "";
	$zipcode = "";
	$state = "";
	$selectedModel = "";
	$rateValue = "";
	$rateLabel = "";
	$accuracy = ""; 
	$prePrintBool = ""; 
	$primaryToolSize = "";
	$dosingdiskThick = "";
	$additToolBool = "";
	$capPolishBool = "";
	$vacPumpBool = "";
	$dustColBool = "";
	$vacLoadBool = ""; 
	$productDesc = ""; 

	$message = ""; 

	
    $thank_you_url = "../../products/RFQ/successful_form.html";
    $error_url = "../../products/RFQ/error.html";



//Error Varriables 
	$nameErr = $emailErr = $phoneNumberErr = $modelSelectErr = ""; 

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $firstName = test_input($_POST["fnameInput"]);
			$lastName = test_input($_POST["lnameInput"]);
			$email = test_input($_POST["emailInput"]);
			$phoneNumber = test_input($_POST["phonenumberInput"]); 
		    $companyName = test_input($_POST["compnameInput"]);
			$title = test_input($_POST["titleInput"]);
			$address = test_input($_POST["addressInput"]);
			$zipcode = test_input($_POST["zipInput"]);
			$city = test_input($_POST["cityInput"]);
			$state = test_input($_POST["stateInput"]);
			
			$selectedModel = implode(", ", $_POST["modelIntrest"]);
			$rateValue = test_input($_POST["rateNUMInput"]); 
			$rateLabel = test_input($_POST["runRateInput"]);
			$accuracy = test_input($_POST["accuracyInput"]); 
			$prePrintBool = test_input($_POST["prePrintCapsInput"]); 
			$primaryToolSize = test_input($_POST["primToolSizeInput"]);
			$dosingdiskThick = test_input($_POST["ddthickInput"]);
			$additToolBool = test_input($_POST["toolInput"]); 
			$capPolishBool = test_input($_POST["capPolishInput"]);
			$vacPumpBool = test_input($_POST["vacPumpInput"]);
			$dustColBool = test_input($_POST["dustColInput"]);
			$vacLoadBool = test_input($_POST["vacLoadInput"]); 
			$productDesc = test_input($_POST["productDescInput"]);  
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
	$message .= "Title: " . $title . "\n";
	$message .= "Address: " . $address . "\n"; 
	$message .= "City: " . $city . "\n"; 
	$message .= "State: " . $state . "\n";
	$message .= "Zip Code: ". $zipcode . "\n"."\n";
	$message .= "Models Intrested In: " . $selectedModel . "\n";
	$message .= "Desired Output Rate: ". $rateValue . " Capsules Per " . $rateLabel . "\n";
	$message .= "Filling Accuracy: " . $accuracy . " %\n"; 
	$message .= "Using Pre-Printed Capsules: " . $prePrintBool . "\n";
	$message .= "Primary Tooling Size: " . $primaryToolSize . "\n";
	$message .=  "Primary Dosing Disk Thickness: " . $dosingdiskThick . " mm \n";
	$message .= "Additional Tooling Required: " . $additToolBool . "\n";
	$message .= "Capsule Polisher Needed: " . $capPolishBool . "\n"; 
	$message .= "Vacuum Pump Needed: " . $vacPumpBool . "\n";
	$message .= "Dust Collector Needed: " . $dustColBool . "\n";
	$message .= "Vacuum Loader Needed: " . $vacLoadBool . "\n";
	$message .= "Product Detail: " . $productDesc . "\n";


    //EMAIL DATA 
    $from_add = "webmaster@drpharm-usa.com"; 

	$to_add = "sales@drpharm-usa.com"; //<-- put your yahoo/gmail email address here

	$subject = "[RFQ][Capsule Filler] - A New Lead has Filled Out an RFQ";
	
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