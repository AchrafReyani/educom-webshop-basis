
<?php 

  //add empty values to variables
  $pronouns = $name = $email = $phonenumber = $street = $housenumber = $postalcode =
  $city = $communication = $message = "";
  
  $communicationmethod = array("email", "phone", "postal");

  //initiate error message variables
  $pronounError = $nameError = $emailError = $phonenumberError = $streetError = $housenumberError = $postalcodeError = $cityError = $communicationError = $messageError = $valid = "";

  function validateInput() { 

    //TODO remove duplicate checking where applicable
    //TODO save valid inputs when form isn't complete after hitting send


    //TODO make a required fields array where you can loop through these 4 fields 
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
    

    //TODO check to see if this can be made smaller
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

  function showFormStart() {
    echo "<h2>Contact Me</h2>

    <p>If you have any questions or comments, please feel free to contact me using the form below.</p>
    <form action=\"index.php\" method=\"POST\">
    ";
  }

  function showFormField($fieldName, $label, $data, $fieldNameError) {

    echo "
    <div>
    <label for=\"$fieldName\">$label:</label>
    <input type=\"text\" name=\"name\" value=\"$data\">
    <span>* <?php echo $fieldNameError;?></span>
    </div>";

  }
  
  //temporary function to show pronoun input field
  function showPronounField($pronouns, $pronounError) {
    echo "
    <div>
  <label for=\"pronouns\">Pronouns:</label>
  <select name=\"pronouns\" value=\"$pronouns\">
    <option value=\"\">Please select a pronoun</option>
    <option value=\"he/him\">He/him</option>
    <option value=\"she/her\">She/her</option>
    <option value=\"they/them\">They/them</option>
    <option value=\"other\">Other</option>
    <option value=\"prefer not to say\">Prefer not to say</option>
  </select>
  <span>* <?php echo $pronounError;?></span>
  </div>
    ";
  }

  //temporary function to show communication preference input field
  function showCommunicationPreference() {
    global $communicationError, $communicationmethod;
  
    echo "
      <div>
        <p>Preferred Communication Method:</p> <span>* $communicationError</span>
    ";
  
    foreach ($communicationmethod as $method) {
      $methodId = lcfirst($method) . "-communication"; // Generate unique ID for each radio button
      echo "
        <label for=\"$methodId\">$method</label>
        <input type=\"radio\" id=\"$methodId\" name=\"communication\" value=\"$method\">
      ";
    }
  
    echo "</div>";
  }

  function showFormEnd() {
    echo "<div>
    <input type=\"submit\" value=\"Send\">
    </div>
  </form>";

  }


  function showContactPage(){ //TODO fix the contact form so that it submits again
    
    showFormStart();
    showPronounField("pronouns", "pronounError");//TODO
    showFormField("name", "Name", "", "nameError"); 
    showFormField("email", "Email", "", "emailError"); 
    showFormField("phonenumber", "Phone number", "", "phonenumberError");
    showFormField("street", "Street", "", "streetError"); 
    showFormField("housenumber", "House number", "", "housenumberError");
    showFormField("postalcode", "Postal code", "", "postalcodeError");
    showFormField("city", "City", "", "cityError"); 
    showCommunicationPreference();//TODO
    showFormField("message", "Message", "", "messageError"); 
    showFormEnd();
  
  }

  ?>

 
