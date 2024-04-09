<body>

  <?php 

  //initiate variables
  $pronouns = $name = $email = $phonenumber = $street = $housenumber = $postalcode =
  $city = $communication = $message = "";

  $communicationmethod = ["email", "phone", "postal"];

  //initiate error message variables
  $pronounError = $nameError = $emailError = $phonenumberError = $streetError = $housenumberError = $postalcodeError = $cityError = $communicationError = $messageError = $valid = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

  ?>
    <h2>Contact Me</h2>

  <section>

  <?php if (!$valid) {/* Show the form if $valid is false */ ?>

    <p>If you have any questions or comments, please feel free to contact me using the form below.</p>
<form action="contact.php" method="POST">
  

<div>
  <label for="pronouns">Pronouns:</label>
  <select name="pronouns" value="<?php echo $pronouns;?>">
    <option value="">Please select a pronoun</option>
    <option value="he/him">He/him</option>
    <option value="she/her">She/her</option>
    <option value="they/them">They/them</option>
    <option value="other">Other</option>
    <option value="prefer not to say">Prefer not to say</option>
  </select>
  <span>* <?php echo $pronounError;?></span>
  </div>

  <div>
  <label for="name">Name:</label>
  <input type="text" name="name" value="<?php echo $name;?>">
  <span>* <?php echo $nameError;?></span>
  </div>

  <div>
  <label for="email">Email:</label>
  <input type="email" name="email" value="<?php echo $email;?>">
  <span> <?php echo $emailError;?></span>
  </div>

  <div>
  <label for="phone number">Phone number:</label>
  <input type="tel" name="phonenumber">
  <span> <?php echo $phonenumberError;?></span>
  </div>

  <div>
  <label for="street">Street name:</label>
  <input type="text" name="street" value="<?php echo $street;?>">
  </div>

  <div>
  <label for="house number">House number (+ suffix if applicable):</label>
  <input type="text" name="housenumber" value="<?php echo $housenumber;?>">
  </div>

  <div>
  <label for="postal code">Postal code:</label>
  <input type="text" name="postalcode" value="<?php echo $postalcode;?>">
  </div>

  <div>
  <label for="city">City:</label>
  <input type="text" name="city" value="<?php echo $city;?>">
  </div>

  <div>
  <p>Preferred Communication Method:</p> <span>* <?php echo $communicationError;?></span>

  <label for="email-communication">Email</label>
  <input type="radio" id="email-communication" name="communication" value="<?php echo $communicationmethod[0];?>">
  

  <label for="phone-communication">Phone</label>
  <input type="radio" id="phone-communication"  name="communication" value="<?php echo $communicationmethod[1];?>">
  
  <label for="postal-communication">Postal Mail</label>
  <input type="radio" id="postal-communication" name="communication" value="<?php echo $communicationmethod[2];?>">
  </div>

  <div>
  <label for="message">Message:</label>
  <textarea name="message"></textarea>
  <span>* <?php echo $messageError;?></span>
  </div>

  <div>
  <input type="submit" value="Send">
  </div>
</form>


  <?php } else { /*show thank you message if $valid is true */ ?>

  <p>Thank you for your message! I will get back to you as soon as possible.</p>

  <?php } ?>


</section>
