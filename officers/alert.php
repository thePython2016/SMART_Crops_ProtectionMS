<?php

if(isset($_SESSION['sent']))
{
    ?>
    <style>
        .alert{
            width:500px !important;
            height:50px !important;
        }
    </style>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo $_SESSION['sent']?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}

unset($_SESSION['sent']);
?>