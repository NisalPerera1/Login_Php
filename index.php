
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
<div class="jumbotron jumbotron-fluid" >
             <div class="container">
             <h1 class="display-4">This is Index Page</h1>
             <div class="card-body">

  <div class="card">
  <div class="card-header">
   Sign In or Sign Up
  </div>
  <div class="card-body">
    <h5 class="card-title">Before Access the Index Page You have to login First</h5>
    <p class="card-text">Already Have an Account?</p>
    <a href="login.php" class="btn btn-primary">Login</a>
  </div>
</div>

<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <p class="card-text">Dont Have an Account?</p>
    <a href="register.php" class="btn btn-primary">Register</a>
  </div>
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