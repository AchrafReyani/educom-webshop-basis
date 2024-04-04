<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/stylesheet.css">
    <title>Contact</title>
</head>
<header>    
    <h1>Achraf's Webshop</h1>
</header>

<body>

  <?php 
  //initiate variables
  $pronoun = '';
  $name = '';
  $email = '';
  $phonenumber = ''; 
  $street = ''; 
  $housenumber = ''; 
  $postalcode = ''; 
  $city = ''; 
  $communication = '';
  $message = '';

  $pronounError = '';
  $nameError = '';
  $emailError = '';
  $phonenumberError = '';
  $streetError = '';
  $housenumberError = '';
  $postalcodeError = '';
  $cityError = '';
  $communicationError = '';
  $messageError = '';

  $valid = false;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //validate the 'POST' data
  }
  ?>

  <ul class='menu'>  
    <li><a href="index.html">Home</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="contact.php">Contact</a></li>
</ul>  


    <h2>Contact Me</h2>
    <p>If you have any questions or comments, please feel free to contact me using the form below.</p>


<form action="mailto:achrafreyani99@gmail.com" method="post" enctype="text/plain">
  
  <label for="pronouns">Pronouns:</label>
  <select id="pronouns" name="pronouns">
    <option value="he/him">He/him</option>
    <option value="she/her">She/her</option>
    <option value="they/them">They/them</option>
    <option value="other">Other</option>
    <option value="prefer not to say">Prefer not to say</option>
  </select>
  
  <label for="name">Name:</label>
  <input type="text" id="name" name="name">
  <br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email">

  <label for="phone number">Phone number:</label>
  <input type="tel" id="phonenumber" name="phonenumber">
  <br>
  <label for="street">Street name:</label>
  <input type="text" id="street" name="street">

  <label for="house number">House number (+ suffix if applicable):</label>
  <input type="text" id="housenumber" name="housenumber"></label>
  <br>
  <label for="postal code">Postal code:</label>
  <input type="text" id="postalcode" name="postalcode"></label>

  <label for="city">City:</label>
  <input type="text" id="city" name="city"></label>

  <p>Preferred Communication Method:</p>
  <label for="email-communication">Email</label>
  <input type="radio" id="email-communication" name="communication" value="email">
  
  <label for="phone-communication">Phone</label>
  <input type="radio" id="phone-communication" name="communication" value="phone">
  
  <label for="postal-communication">Postal Mail</label>
  <input type="radio" id="postal-communication" name="communication" value="postal">
  
  <label for="message">Message:</label>
  <textarea id="message" name="message"></textarea>
  <br>
  <input type="submit" value="Send">

</form>


</body>
<footer>&copy; Copyright 2024 Achraf Reyani</footer>
</html>
