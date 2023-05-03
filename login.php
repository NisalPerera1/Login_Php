<?php
require_once "header.php";
session_start();

// Check if the user is already logged in.then reredirect
if (isset($_SESSION['user_id'])) {
  header('Location: profile.php');
  exit();
}


if (isset($_POST['submit'])) {

  // Get the username and password from the POST request.
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the inputs
  $errors = array();
  if (empty($username)) {
    $errors[] = "Username is required.";
  }
  if (empty($password)) {
    $errors[] = "Password is required.";
  }

  // If there are no errors, check the credentials in the database
  if (empty($errors)) {
    // Check if the username and password are valid.
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      // Get the user's ID and username from the database.
      $row = mysqli_fetch_assoc($result);
      $user_id = $row['id'];
      $username = $row['username'];

      // Set the session variables.
      $_SESSION['user_id'] = $user_id;
      $_SESSION['username'] = $username;

      // Redirect the user to the profile page.
      header('Location: profile.php');
      exit();
    } 
    else {
      $errors[] = 'Invalid username or password.';
    }
  }

  // If there are errors, display them to the user
  if (!empty($errors)) {
    foreach ($errors as $error) {
      echo "<div class='error'>$error</div>";
    }
  }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
 <style>
    .form-container {
      width: 50%;
      margin: 0 auto;
    }
    h4 {
    text-align: center;
  }
    </style>

    </head>
    <body>
        <h4 text-align="center">Enter Your Credintials</h4>
        <?php if (isset($errors)): ?>

        <ul>
        <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
        </ul>

        <?php endif; ?>

         <div class="form-container">
        <form method="POST" action="">

        <div class="form-group">
        <label for="Username" name="username">User Name:</label>
        <input type="text" class="form-control"  name="name"><br>

        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1"><br>

          <input class="btn btn-primary" type="submit" value="login">
        </div>
      </div>
        </form>
        <p class= "para">Don't have an account? <a href="register.php">Register here</a>.</p>
    </body>
</html>