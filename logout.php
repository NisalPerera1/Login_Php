
<!DOCTYPE html>
<html>
<body>


<?php 
require_once "header.php";
?>
<button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target=".modal">Open Modal</button>

<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are You Sure? You May Have To Sign In Again !!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="login.php" class="btn btn-primary">Sign Out</a>
      </div>
    </div>
  </div>
</div>


</body>
</html>