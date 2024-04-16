
<?php 


  

  function validateForm() { 
      //add empty values to variables
  $pronouns = $name = $email = $phonenumber = $street = $housenumber = $postalcode =
  $city = $communication = $message = "";
  

  //initiate error message variables
  $pronounsError = $nameError = $emailError = $phonenumberError = $streetError = $housenumberError = $postalcodeError = $cityError = $communicationError = $messageError = "";
    $valid = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //TODO remove duplicate checking where applicable
      //TODO save valid inputs when form isn't complete after hitting send


      //save input if valid and send error message when not valid
      if (empty($_POST["pronouns"])) {
        $pronounsError = "Pronouns are required";
      } else {
        $pronouns = $_POST['pronouns'];
      }


    if (empty($_POST["name"])) {
        $nameError = "Name is required";
      } 
      else {
        $name = $_POST['name'];
      }

    if (empty($_POST["email"])) {
        $emailError = "Email is required";
      } 
      else {
        $email = $_POST['email'];
      }

    if (empty($_POST["message"])) {
        $messageError = "Message is required";
      } else {
        $message = $_POST['message'];
      }

      if (empty($_POST["phonenumber"])) {
        $phonenumberError = "Phone number is required";
      } 
      else {
        $phonenumber = $_POST['phonenumber'];

      } 

      if (empty($_POST["street"])) {
        $streetError = "Street is required";
      } 
      else {
        $street = $_POST['street'];
      }

      if (empty($_POST["housenumber"])) {
        $housenumberError = "House number is required";
      } 
      else {
        $housenumber = $_POST['housenumber'];
      }

      if (empty($_POST["postalcode"])) {
        $postalcodeError = "Postal code is required";
      } 
      else {
        $postalcode = $_POST['postalcode'];
      }

      if (empty($_POST["city"])) {
        $cityError = "City is required";
      } 
      else {
        $city = $_POST['city'];
      }





      if (empty($_POST["communication"])) {
        $communicationError = "Communication method is required";
      } else {
        $communication = $_POST['communication'];
      }


      $requiredFields = false;
    if (!empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"])) {
        $requiredFields = true;
      }

      //TODO check to see if this can be made smaller
    if ($_POST['communication'] == "email" && empty($_POST["email"])) {
        $emailError = "Please enter a valid email address";
      } else if ($_POST["communication"] == "email" && !empty($_POST["email"]) &&  $requiredFields ) {
          $valid  = true;
      }

    if ($_POST["communication"] == "phone" && empty($_POST["phonenumber"])) {
        $phonenumberError = "Please enter a valid phone number";
      } else if ($_POST["communication"] == "phone" && !empty($_POST["phonenumber"]) &&  $requiredFields)
      {
          $valid = true;
      }


      $isPostalAddressMandatory = ($_POST["communication"] == 'postal') || empty($_POST['street']) || empty($_POST['housenumber']) || empty($_POST['postalcode']) || empty($_POST['city'] && $requiredFields);

      if ($isPostalAddressMandatory && empty($_POST['street'])) {
        $streetError = 'Street is mandatory';
      }
      if ($isPostalAddressMandatory && empty($_POST['housenumber'])) {
        $housenumberError = 'House number is mandatory';
      }
      if ($isPostalAddressMandatory && empty($_POST['postalcode'])) {
        $postalcodeError = 'Postal code is mandatory';
      }
      if ($isPostalAddressMandatory && empty($_POST['city'])) {
        $cityError = 'City is mandatory';
      }

      
      if ($_POST["communication"] == "postal" && !empty($_POST["street"]) && !empty($_POST["housenumber"]) && !empty($_POST["postalcode"]) && !empty($_POST["city"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"])) { 
      $valid = true;
      }
    }

  //TODO handle return statement inside index
    return [ 'valid' => $valid, 'pronouns' => $pronouns, 'name' => $name, 'email' => $email, 'phonenumber' => $phonenumber, 'street' => $street, 
             'housenumber' => $housenumber, 'postalcode' => $postalcode, 'city' => $city, 'communication' => $communication, 'message' => $message,
             'pronounsError' => $pronounsError, 'nameError' => $nameError, 'emailError' => $emailError, 'phonenumberError' => $phonenumberError, 'streetError' => $streetError, 'housenumberError' => $housenumberError, 'postalcodeError' => $postalcodeError, 'cityError' => $cityError, 'communicationError' => $communicationError, 'messageError' => $messageError ];
  }

  function showFormStart() {
    echo "<h2>Contact Me</h2>

    <p>If you have any questions or comments, please feel free to contact me using the form below.</p>
    <form action=\"index.php\" method=\"POST\">
    <input name=\"page\" value=\"Contact\" type=\"hidden\">
    ";
  }

  function showFormField($fieldName, $label, $data) {

    echo "
    <div>
    <label for=\"$fieldName\">$label:</label>
    <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
    <span>* " . $data[$fieldName . "Error"]  . "</span>
    </div>";

  }
  
  //temporary function to show pronoun input field
  function showPronounField($fieldName, $label, $data) {
    echo "
    <div>
  <label for=\"$fieldName\">$label:</label>
  <select name=\"$fieldName\" value=\"". $data[$fieldName]."\">
    <option value=\"\">Please select a pronoun</option>
    <option value=\"he/him\" ". ($data[$fieldName] == "he/him" ? "selected=\"selected\"" : "").">He/him</option>
    <option value=\"she/her\" " . ($data[$fieldName] == "she/her" ? "selected=\"selected\"" : "").">She/her</option>
    <option value=\"they/them\" ". ($data[$fieldName] == "they/them" ? "selected=\"selected\"" : "").">They/them</option>
    <option value=\"other\" ". ($data[$fieldName] == "other" ? "selected=\"selected\"" : "").">Other</option>
    <option value=\"prefer not to say\" ". ($data[$fieldName] == "prefer not to say" ? "selected=\"selected\"" : "").">Prefer not to say</option>
  </select>
  <span>* " . $data[$fieldName . "Error"]  . "</span>
  </div>
    ";
  }

  //temporary function to show communication preference input field
  function showCommunicationPreference($data) {
      $communicationmethod = ["email", "phone", "postal"];
      $communicationError = "";

    
  
    echo "
      <div>
        <p>Preferred Communication Method:</p> <span>* $communicationError</span>
    ";
  
    foreach ($communicationmethod as $method) {
      $methodId = lcfirst($method) . "-communication"; // Generate unique ID for each radio button
      echo "
        <label for=\"$methodId\">$method</label>
        <input type=\"radio\" id=\"$methodId\" name=\"communication\" value=\"$method\" " . ($data["communication"] == $method ? "checked" : "") . ">
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


  function showContactPage($data){ //TODO fix the contact form so that it submits again
    
    showFormStart();
    showPronounField("pronouns", "Pronouns", $data);//TODO
    showFormField("name", "Name", $data); 
    showFormField("email", "Email", $data); 
    showFormField("phonenumber", "Phone number", $data);
    showFormField("street", "Street", $data); 
    showFormField("housenumber", "House number", $data);
    showFormField("postalcode", "Postal code", $data);
    showFormField("city", "City", $data); 
    showCommunicationPreference($data);
    showFormField("message", "Message", $data); 
    showFormEnd();
  
  }

  ?>

 
