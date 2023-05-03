
<!DOCTYPE html>
<html>
<body>


<?php 
require_once 'functions.php';
require_once "header.php";
?>

<h4 class= "para" >Welcome to the Index Page</h4>

<?php 

if (isloggedin()) {
  // user is logged in, allow access to page
  echo "You're logged in as " . getusername($_SESSION['user_id']);
?>
  <a href="profile.php" class="btn btn-primary">Go to Profile</a>
<?php
} else {
  // user is not logged in, redirect to login page
  echo "You have to log in First!!";
?>
  <p class="para">Already Have an Account? <a href="login.php">Login here</a>.</p>
  <p class="para">Dont Have an Account? <a href="register.php">Register here</a>.</p>

<?php
  exit();
}
?>

</body>
</html>