<?php 

function showLoginStart() {
  echo "<h2>Register</h2>
  <p>Please enter your details to register.</p>
  <form action=\"register.php\" method=\"post\">
  <input name=\"page\" value=\"Login\" type=\"hidden\">";
}

function showLoginEnd() {
   echo "<div>
   <input type=\"submit\" value=\"Send\">
   </div>
 </form>";
}

function showLoginField($fieldName, $label, $data) {

   echo "
   <div>
   <label for=\"$fieldName\">$label:</label>
   <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
   <span>* " . $data[$fieldName . "Error"]  . "</span>
   </div>";

 }

function validateLogin($email, $password) {
    $usersFile = 'users.txt';
  
    if (!file_exists($usersFile)) {
      return false; // File not found error
    }
  
    $lines = file($usersFile);
    foreach ($lines as $line) {
      $userData = explode('|', trim($line)); // Split line by delimiter '|' and trim whitespaces
      if (count($userData) !== 3) { // Check if data has the expected format
        continue; // Skip invalid lines
      }
  
      list($user_email, $user_name, $hashed_password) = $userData; // Assign variables
  
      if ($user_email === $email && password_verify($password, $hashed_password)) {
        return true; // Valid email and password found
      }
    }
  
    return false; // Login failed: Email or password not found
  }

    function showLoginPage(){

      showLoginStart();
      showLoginField("email", "Email", $data);
      showLoginField("password", "Password", $data);
      showLoginEnd();
        
    }

?>