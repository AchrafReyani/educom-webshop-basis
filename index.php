<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/stylesheet.css"> 
</head>
<body>


<?php

//includes
include 'header.php';
include 'menu.php';
include 'home.php';
include 'about.php';
//include 'contact.php';
include 'footer.php';


//functions

function showContactPage() {
    include 'contact.php';
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

function getRequestedPage(){
	if(!isset($_GET['page'])){
		return 'Home';
	}
	else {
		return $_GET['page'];
	}
}

function showResponsePage($data){
	showHeader();
	showMenu();
	showContent($data);
	showFooter();
}



$page = getRequestedPage();
showResponsePage($page);

?>

</body>
</html>