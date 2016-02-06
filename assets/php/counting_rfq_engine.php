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

	$interestReason = "";
	$unscramblerInterest ="";
	$counterInterest = ""; 
	$rateValue = "";
	$rateLabel = "";
	$productsType = "";
	$tabletShape = "";
	$tabletLength = "";
	$tabletWidth = "";
	$tabletThickness = ""; 
	$capsuleSizes = "";
	$roomLength = "";
	$roomWidth = "";
	$roomHeight = "";
	$roomUnit = "";
	$description = ""; 

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
			$city = test_input($_POST["cityInput"]);
			$state = test_input($_POST["stateInput"]);
			$zipcode = test_input($_POST["zipInput"]);

			$interestReason = test_input($_POST["reasonInput"]);
			$unscramblerInterest = implode(", ", $_POST["unscramInterest"]);
			$counterInterest = implode(", ", $_POST["counterInterest"]);

			$rateValue = test_input($_POST["rateNUMInput"]); 
			$rateLabel = test_input($_POST["runRateInput"]);

			$productsType = implode(", ", $_POST["productInput"]);

			$tabletShape = test_input($_POST["tabletshapeInput"]); 

			$tabletLength = test_input($_POST["tabletlengthInput"]);
			$tabletWidth = test_input($_POST["tabletwidthInput"]);
			$tabletThickness = test_input($_POST["tabletthickInput"]);

			$capsuleSizes = implode(", ", $_POST["capsizeInput"]);

			$roomLength = test_input($_POST["roomlengthInput"]);
			$roomWidth = test_input($_POST["roomwidthInput"]);
			$roomHeight = test_input($_POST["roomheightInput"]);
			$roomUnit = test_input($_POST["roomunitInput"]);

			$description = test_input($_POST["descriptionInput"]);
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
	$message .= "Phone Number: " . $phoneNumber . "\n"; 
	$message .= "Company: " . $companyName . "\n"; 
	$message .= "Title: " . $title . "\n";
	$message .= "Address: " . $address . "\n"; 
	$message .= "City: " . $city . "\n"; 
	$message .= "State: " . $state . "\n";
	$message .= "Zip Code: ". $zipcode . "\n"."\n";
	$message .= "Main Interst: " . $interestReason . "\n";
	$message .= "Unscrambler Models Interest: " . $unscramblerInterest . "\n";
	$message .= "Counter Models Interest: " . $counterInterest . "\n";
	$message .= "Desired Run Rate: ". $rateValue . " Bottles Per " . $rateLabel . "\n";
	$message .= "Products: " . $productsType . " %\n"; 
	$message .= "Tablet Shape: " . $tabletShape . "\n";
	$message .= "Tablet Dimensions (L x W x T): " . $tabletLength . " x " . $tabletWidth . " x " . $tabletThickness . " mm \n";
	$message .= "Capsule Sizes: " . $capsuleSizes . "\n";
	$message .= "Tablet Dimensions (L x W x H): " . $roomLength . " x " . $roomWidth . " x " . $roomHeight . " " . $roomUnit . "\n";
	$message .= "Detail: " . $description . "\n";


    //EMAIL DATA 
    $from_add = "webmaster@drpharm-usa.com"; 

	$to_add = "sales@drpharm-usa.com"; //<-- put your yahoo/gmail email address here

	$subject = "[RFQ][Counting] - A New Lead has Filled Out an RFQ";
	
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