<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'php_registration_and_login');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$conn) {
    die("Error: " . mysqli_connect_error());
}
?>


