<?php


// Check if the user is logged in.
if (!isset($_SESSION['user_id'])) {

  // The user is not logged in, so redirect them to the login page.
  header('Location: login.php');
  exit();
}


$username = $_SESSION['username'];
echo '<h1>Welcome, ' . $username . '! You have Successfully Loged in </h1>';



?>