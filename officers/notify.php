<?php

if(isset($_SESSION['messageStudent']))
{
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert"
    style="display:flex; flex-direction:row">
  <p></p><strong><?php echo $_SESSION['messageStudent']?>
  <button  class="btn btn-primary"><a href="exam_resultslist.php">View</a></button>
  </p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}

unset($_SESSION['messageStudent']);
?>
