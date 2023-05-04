<?php
require_once "logout.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title>Login App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        nav {
            background-color: #333; /* Change the background color of the navbar */
        }
        nav a {
            color: #fff; /* Change the text color of the links in the navbar */
        }
        nav a:hover {
            background-color: #555; /* Change the background color of the links when hovered */
        }
        .dropdown-menu {
            z-index: 999; /* Add a high z-index to the dropdown menu */
        }
        .dropdown-item:hover {
            background-color: #555; /* Change the background color of the dropdown items when hovered */
        }
        .nav-link {
            display: inline-block; /* Set the display property of the links in the navbar to inline-block */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md">
        <div class="container">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target=".modal">Logout</a>

                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
