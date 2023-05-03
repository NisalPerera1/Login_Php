<?php
require_once "dbconfig.php";

function isloggedin() {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }

  function db_connect() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (mysqli_connect_errno()) {
      die('Database connection failed: ' . mysqli_connect_error());
    }
    return $conn;
  }

function getusername($user_id) {
  $conn = db_connect();
  $user_id = mysqli_real_escape_string($conn, $user_id);
  $query = "SELECT username FROM users WHERE id = '$user_id'";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die('Error Getting username: ' . mysqli_error($conn));
  }
  $row = mysqli_fetch_assoc($result);
  return $row['username'];
}

// Register a new user
function registeruser($username, $email, $password) {
    global $mysqli;
    db_connect();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the SQL statement
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


function validateRegistration($username, $email, $password, $confirm_password) {
    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors['username'] = 'Please enter a username';
    } elseif (strlen($username) < 3) {
        $errors['username'] = 'Username must be at least 3 characters';
    }

    // Validate email
    if (empty($email)) {
        $errors['email'] = 'Please enter an email address';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }

   if (empty($password)) {
  $errors['password'] = 'Please enter a password';
} elseif (strlen($password) < 6) {
  $errors['password'] = 'Password must be at least 6 characters';

} elseif ($password !== $confirm_password) {
  $errors['password'] = 'Passwords do not match';
}

    return $errors;
}

// Login Functions
function loginuser($username, $password) {
    $conn = db_connect();
  
    // Retrieve the user's information from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
  
    // Verify the password
    if (password_verify($password, $user['password'])) {
      // Password is correct, set session variables
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      return true;
      
    } else {
      // Password is incorrect
      return false;
    }
}


function validateemail($email) {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return 'Please enter a valid email address.';
  }
  return '';
}

function validatepassword($password) {
  $errors = array();
  if (strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters.';
  }
  return $errors;
}

function passwordmatch($password, $confirm_password) {
  if ($password !== $confirm_password) {
    return 'Passwords do not match.';
  }
  return '';
}

function validateusername($username) {
  if (strlen($username) < 4 || strlen($username) > 16) {
    return 'Username must be between 4 and 16 characters.';
  }
  return '';
}
