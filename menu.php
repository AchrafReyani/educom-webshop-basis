 
<?php 
//if user is logged in only show logout button, if user is not logged in show login and register buttons
function showMenu() {
    echo '<ul class=\'menu\'>
  <li><a href=\'index.php?page=Home\'>Home</a></li>
  <li><a href=\'index.php?page=About\'>About</a></li>
  <li><a href=\'index.php?page=Contact\'>Contact</a></li>';
  if (isset($_SESSION['username'])) {
    echo '<li><a href=\'index.php?page=Logout\'>Logout</a></li>';
  } else {
    echo '<li><a href=\'index.php?page=Login\'>Login</a></li>
  <li><a href=\'index.php?page=Register\'>Register</a></li>';
  } 
  echo '</ul>';
}
?>


