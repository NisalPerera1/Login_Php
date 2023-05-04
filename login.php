<?php
require_once "header.php";
session_start();

// Check if the user is already logged in. Then redirect.
if (isset($_SESSION['user_id'])) {
  header('Location: profile.php');
  exit();
}

// Generate a CSRF token
$csrf_token = uniqid();

if (isset($_POST['submit'])) {

  // Check the CSRF token
  if ($_POST['csrf_token'] !== $csrf_token) {
    die("Invalid CSRF token");
  }

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
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

      // Get the user's ID and username from the database.
      $row = $result->fetch_assoc();
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
        <h4 text-align="center">Enter Your Credentials</h4>
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
        <label for="Username" name="name">User Name:</label>
        <input type="text" class="form-control"  name="name"><br>

        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password"><br>

          <input class="btn btn-primary" type="submit" value="login">
          
        </div>
      </div>
        </form>
        <p class= "para">Don't have an account? <a href="register.php">Register here</a>.</p>
    </body>
</html>