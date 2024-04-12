<?php 

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
        echo '<form action="login.php" method="post"> <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <button type="submit">Login</button>
    </form>';
    }

?>