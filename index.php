
<!DOCTYPE html>
<html>
<body>


<?php 
require_once 'functions.php';
require_once "header.php";
?>


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
<div class="card text-center">
  <div class="card-header">
  Welcome to the Index Page
  </div>

  <div class="card-body">
    <h5 class="card-title">Before Access the Index Page You have to login First</h5>
    <p class="para">Already Have an Account? <a href="login.php">Login here</a>.</p>
  <p class="para">Don't Have an Account? <a href="register.php">Register here</a>.</p>
  </div>

  <!-- <div class="card-footer text-muted">
    2 days ago
  </div> -->

</div>
  

<?php
  exit();
}
?>

</body>
</html>