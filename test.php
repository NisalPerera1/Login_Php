<!DOCTYPE html>
<html>
  <head>
  <span class="border border-primary"></span>
    <title>Center Aligned Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body class="text-center">

    <?php 
    require_once "header.php";
    require_once "test.css";
    ?>
            <div class="jumbotron jumbotron-fluid">
             <div class="container">
             <h1 class="display-4">This is Test Page</h1>
            <p class="lead">Created For Use the Bosstrap Framework</p>
            </div>
             </div>


        <div class="card" style="width: 18rem;">
        <img src="m21.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Samsung Galaxy M21</h5>
        <p class="card-text">Boostrap Card Used.Some quick example text to build on the card title and make up the bulk of the card's content.</p>

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>

        <a href="#" class="btn btn-primary">Order Now</a>
      </div>
    </div>
    <br>

    

    <nav aria-label="Page navigation example">
    <ul class="pagination bg-light">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
    <div class="ml-auto">
    <li class="page-item"><a class="page-link" href="index.php">Home</a></li>
    </div>
  </ul>
</nav>



  </body>
</html>
