
<?php 
  function showFormStart() {
    echo "<h2>Contact Me</h2>

    <p>If you have any questions or comments, please feel free to contact me using the form below.</p>
    <form action=\"index.php\" method=\"POST\">
    ";
  }

  function showFormField($fieldName, $label, $data) {

    echo "
    <div>
    <label for=\"$fieldName\">$label:</label>
    <input type=\"text\" name=\"name\" value=\"$data\">
    <span>* error message</span>
    </div>";

  }

  function showFormEnd($returnPage, $submitButtonText) {
    echo "<div>
    <input type=\"submit\" value=\"Send\">
    </div>
  </form>";

  }


  function showContactPage(){
    
    showFormStart();
    
    showFormField("name", "Name", "name"); 
    showFormField("email", "Email", "email"); 
    showFormField("message", "Message", "message"); 
  
    showFormEnd("contact.php", "Send");
  

  }

  ?>
  
  $valid 

<?php /*
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

  <div>
  <label for=\"name\">Name:</label>
  <input type=\"text\" name=\"name\" value=\"$name\">
  <span>* <?php echo $nameError;?></span>
  </div>

  <div>
  <label for=\"email\">Email:</label>
  <input type=\"email\" name=\"email\" value=\"$email\">
  <span> <?php echo $emailError;?></span>
  </div>

  <div>
  <label for=\"phone number\">Phone number:</label>
  <input type=\"tel\" name=\"phonenumber\">
  <span>$phonenumberError</span>
  </div>

  <div>
  <label for=\"street\">Street name:</label>
  <input type=\"text\" name=\"street\" value=\"$street\">
  </div>

  <div>
  <label for=\"house number\">House number (+ suffix if applicable):</label>
  <input type=\"text\" name=\"housenumber\" value=\"$housenumber\">
  </div>

  <div>
  <label for=\"postal code\">Postal code:</label>
  <input type=\"text\" name=\"postalcode\" value=\"$postalcode\">
  </div>

  <div>
  <label for=\"city\">City:</label>
  <input type=\"text\" name=\"city\" value=\"$city\">
  </div>

  <div>
  <p>Preferred Communication Method:</p> <span>* $communicationError</span>

  <label for=\"email-communication\">Email</label>
  <input type=\"radio\" id=\"email-communication\" name=\"communication\" value=\"$communicationmethod[0]\">
  

  <label for=\"phone-communication\">Phone</label>
  <input type=\"radio\" id=\"phone-communication\"  name=\"communication\" value=\"$communicationmethod[1]\">
  
  <label for=\"postal-communication\">Postal Mail</label>
  <input type=\"radio\" id=\"postal-communication\" name=\"communication\" value=\"$communicationmethod[2]>
  </div>

  <div>
  <label for=\"message\">Message:</label>
  <textarea name=\"message\"></textarea>
  <span>* $messageError </span>
  </div>

*/?>

 
