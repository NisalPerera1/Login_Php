<?php
require_once "dbconfig.php";
require_once "header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Validate user input
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Validate input
  $errors = array();
  if (empty($name)) {
    $errors[] = 'Please enter your name.';
  }
  if (empty($email)) {
    $errors[] = 'Please enter your email.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
  }
  if (empty($password)) {
    $errors[] = 'Please enter your password.';
  } elseif (strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters.';
  }

  if (empty($errors)) {
    // Insert user data into the database
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    $result = $stmt->execute();

    if ($result) {
      header('Location: login.php');
      exit();
    } else {
      $error = 'Registration failed';
    }
  } else {
    $error = implode('<br>', $errors);
  }
}

?>
<html>
<head>
  <title>Registration Page</title>
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
  <h4 text-align="center">Register</h4>
  <?php if (isset($error)): ?>
    <div><?php echo $error ?></div>
  <?php endif; ?>
  <div class="form-container">

  <form method="post">
  
    <div class="form-group">
        <label for="Username" name="name">User Name:</label>
        <input type="text" class="form-control"  name="name"><br>

        <div class="form-group">
        <label for="email" name="email">User Name:</label>
        <input type="email" class="form-control"  name="email"><br>

        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" name="password" class="form-control" id="password"><br>

        <input class="btn btn-primary" type="submit" value="register">
        </div>
      </div>
      </form>
      <p class= "para">Already have an account? <a href="login.php">Sign In</a>.</p>

</body>
</html>

