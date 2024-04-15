<?php 

function showRegisterStart() {
   echo "<h2>Register</h2>
   <p>Please enter your details to register.</p>
   <form action=\"register.php\" method=\"post\">
   <input name=\"page\" value=\"Register\" type=\"hidden\">";
}

function showRegisterEnd() {
    echo "<div>
    <input type=\"submit\" value=\"Send\">
    </div>
  </form>";
}

function showRegisterField($fieldName, $label, $data) {

    echo "
    <div>
    <label for=\"$fieldName\">$label:</label>
    <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
    <span>* " . $data[$fieldName . "Error"]  . "</span>
    </div>";

  }


    function validateRegistration() {

        $email = $name = $password = $confirm_password = "";
        $emailError = $nameError = $passwordError = $confirm_passwordError = "";
        $valid = false;

        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
      //save input if valid and send error message when not valid
      if (empty($_POST["email"])) {
        $emailError = "Email is required";
      } else {
        $email = $_POST['email'];
      }

      if (empty($_POST["name"])) {
        $nameError = "Name is required";
      } else {
        $name = $_POST['name'];
      }

      if (empty($_POST["password"])) {
        $passwordError = "Password is required";
      } else {
        $password = $_POST['password'];
      }

      if (empty($_POST["confirm_password"])) {
        $confirm_passwordError = "Confirm password is required";
      } else {
        $confirm_password = $_POST['confirm_password'];
      }

    }




    }

    function showRegisterPage($data){

        showRegisterStart();
        showRegisterField('name', 'Name', $data);
        showRegisterField('email', 'Email', $data);
        showRegisterField('password', 'Password', $data);
        showRegisterField('confirm_password', 'Confirm Password', $data);
        showRegisterEnd();
    
    }

?>