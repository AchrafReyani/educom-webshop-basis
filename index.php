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
include 'register.php';
include 'login.php';

session_start(); //start session

//functions
function showContent($data){
	switch($data['page'])
	{
		case 'Home';
		  showHomePage();
		  break;
		case 'About';
		  showAboutPage();
		  break;
		case 'Contact';
		  showContactPage($data);
      break;
    case 'Thankyou';
      showThankYouPage($data);
      break;
    case 'Register';
		  showRegisterPage();
		  break;
		case 'Login';
		  showLoginPage();
		  break;
		default; 
		  showHomePage();
	}
}

function getRequestedPage() {
  $page = 'Home';
echo 1;
  // Check for page in POST data if request method is POST
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 2;
    if (isset($_POST['page'])) {
      echo 3;
      $page = $_POST['page'];
      // Check if the requested page is Contact and perform validation
       
    }
  
  } else {
    // Fallback to GET if no page found in POST
    if (!isset($_GET['page'])) {
      $page = 'Home';
    } else {
      $page = $_GET['page'];
    }
  }

  return $page;
}

function processRequest($page) {
  switch($page)
	{
		case 'Contact';
      $data = validateInput(); // Call the validation function from contact.php (assuming it's included)
      // Handle the validation result
      if ($data['valid']) {
        // Form is valid, show Thank You page (or perform further actions)
        $page = 'Thankyou';
      }
      break;
    case 'Register';
      $data = validateRegistration();
      if ($data['valid']) {
        $page = 'Home';
        //set state to logged in?
        //write user to file
      }
      break;
    case 'Login';
      $data = validateLogin();
      if ($data['valid']) {
        $page = 'Home';
        //set state to logged in
      }
      break;
		default;

      break;
    }
    $data['page'] = $page; //add value of current page to the data
    return $data;
}
function showResponsePage($data){
	beginDocument();
	showHeader();
	showMenu();
	showContent($data); //use the data received to fill in unifinished form with valid data
	showFooter();
	endDocument();
}

//start of application
$page = getRequestedPage();
$data = processRequest($page);
var_dump($data);//for testing
showResponsePage($data);

?>