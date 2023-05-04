<?php

// This is the profile page.

// Check if the user is logged in.
if (!isset($_SESSION['user_id'])) {

  // The user is not logged in, so redirect them to the login page.
  header('Location: login.php');
  exit();
}

// The user is logged in, so show their profile.
echo '<p>Welcome, ' . $_SESSION['username'] . '!</p>';






?>