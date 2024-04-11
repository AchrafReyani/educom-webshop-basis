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
    case 'Thankyou';
      showThankYouPage();
		  break;
		default; 
		  showHomePage();
	}
}

$requestedPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestedPage = trim($requestedPage, '/');  // Remove leading/trailing slashes

function getRequestedPage() { //TODO check back to see if this is single door routing or not
	$page = 'Home';
  
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