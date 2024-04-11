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

function getRequestedPage() {
  $page = 'Home';

  // Check for page in POST data if request method is POST
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['page'])) {
      $page = $_POST['page'];

      // Check if the requested page is Contact and perform validation
      if ($page === 'Contact') {
        $valid = validateInput(); // Call the validation function from contact.php (assuming it's included)

        // Handle the validation result
        if ($valid) {
          // Form is valid, show Thank You page (or perform further actions)
          $page = 'Thankyou';
        } 
      }
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