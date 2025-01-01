<?php

require "connection.php";
$id=$_GET['id'];
  
$delete=mysqli_query($conn,"delete from farmers where mobileNumber='$id'");
if($delete)
{
    echo "<script>
    
    window.location.href='farmers-list.php';
    </script>";
}
else 
{
    echo "<script>
    
    window.location.href='farmers-list.php';
    </script>";
}



?>