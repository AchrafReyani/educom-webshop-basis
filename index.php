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
    }
    $data['page'] = $page;
    return $data;
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
$data = processRequest($page);
var_dump($data);
showResponsePage($data);

?>