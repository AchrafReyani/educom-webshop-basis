<?php

//includes
include 'header.php';
include 'menu.php';
include 'home.php';
include 'about.php';
include 'contact.php';
include 'footer.php';
include 'thankyou.php';
include 'beginDocument.php';
include 'endDocument.php';

  //initiate variables global
  global $valid;
  global $pronouns, $name, $email, $phonenumber, $street, $housenumber, $postalcode, $city, $communication, $message;
  global $communicationmethod;
  global $pronounError, $nameError, $emailError, $phonenumberError, $streetError, $housenumberError, $postalcodeError, $cityError, $communicationError, $messageError, $valid;
  
  //add empty values to variables
  $pronouns = $name = $email = $phonenumber = $street = $housenumber = $postalcode =
  $city = $communication = $message = "";
  
  $communicationmethod = ["email", "phone", "postal"];

  //initiate error message variables
  $pronounError = $nameError = $emailError = $phonenumberError = $streetError = $housenumberError = $postalcodeError = $cityError = $communicationError = $messageError = $valid = "";

//functions

function validateInput() {
    if (empty($_POST["pronouns"])) {
      $pronounError = "Pronouns are required";
    } 

  if (empty($_POST["name"])) {
      $nameError = "Name is required";
    } 

  if (empty($_POST["message"])) {
      $messageError = "Message is required";
    } 

  if (empty($_POST["communication"])) {
      $communicationError = "Communication method is required";
    }

  if ($_POST["communication"] == "email" && empty($_POST["email"])) {
      $emailError = "Please enter a valid email address";
    } else if ($_POST["communication"] == "email" && !empty($_POST["email"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"]) ) {
        $valid  = true;
    }

  if ($_POST["communication"] == "phone" && empty($_POST["phonenumber"])) {
      $phonenumberError = "Please enter a valid phone number";
    } else if ($_POST["communication"] == "phone" && !empty($_POST["phonenumber"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"]))
    {
        $valid = true;
    }

if ($_POST["communication"] == "postal" && empty($_POST["street"]) || empty($_POST["housenumber"]) || empty($_POST["postalcode"]) || empty($_POST["city"]) || empty($_POST["communication"]) || empty($_POST["message"])) {
    $streetError = $housenumberError = $postalcodeError = $cityError = "Please fill in the entire address"; } 
    else if ($_POST["communication"] == "postal" && !empty($_POST["street"]) && !empty($_POST["housenumber"]) && !empty($_POST["postalcode"]) && !empty($_POST["city"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"])) { 
    $valid = true;
  }

}

function showContent($data){
	switch($data)
	{
		case 'Home';
		  showHomePage();
		  break;
		case 'About';
		  showAboutPage();
		  break;
		case 'Contact';
		  showContactPage();
		  break;
		default; 
		  showHomePage();
	}
}

$requestedPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestedPage = trim($requestedPage, '/');  // Remove leading/trailing slashes

function getRequestedPage() {
	// Check for page in POST data if request method is POST
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	  if (isset($_POST['page'])) {
		return $_POST['page'];
	  }
	}
  
	// Fallback to GET if no page found in POST
	if (!isset($_GET['page'])) {
	  return 'Home';
	} else {
	  return $_GET['page'];
	}
  }

$requestedPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestedPage = trim($requestedPage, '/');
	  


function showResponsePage($data){
	beginDocument();
	showHeader();
	showMenu();
	showContent($data);
	showFooter();
	endDocument();
}



$page = getRequestedPage();
showResponsePage($page);

?>