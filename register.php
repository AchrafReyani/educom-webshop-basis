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
        if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];



    }}

    function showRegisterPage(){
        
        showRegisterStart();
        showRegisterField('name', 'Name', $data);
        showRegisterField('email', 'Email', $data);
        showRegisterField('password', 'Password', $data);
        showRegisterEnd();
    

    }

?>