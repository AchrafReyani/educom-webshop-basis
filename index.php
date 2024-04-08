<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/stylesheet.css"> 
</head>
<body>


<?php
//functions

function showHeader() {
    include 'header.php';
}

function showMenu() {
    include 'menu.php';
}

function showHomePage() {
    include 'home.php';
}

function showAboutPage() {
    include 'about.php';
}

function showContactPage() {
    include 'contact.php';
}

function showFooter() {
    include 'footer.php';
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
	showFooter();
}

$page = getRequestedPage();
showResponsePage($page);

?>

</body>
</html>