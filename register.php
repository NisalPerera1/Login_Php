<?php
require_once "dbconfig.php";

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
</head>
<body>
  <h1>Register</h1>
  <?php if (isset($error)): ?>
    <div><?php echo $error ?></div>
  <?php endif; ?>
  <form method="post">
    <label>Name:</label><br>
    <input type="text" name="name"><br>
    <label>Email:</label><br>
    <input type="email" name="email"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="Register">
  </form>
</body>
</html>
