<?php

require "connection.php";
$id=$_GET['id'];
  
$delete=mysqli_query($conn,"delete from agroofficers where mobileNumber='$id'");
if($delete)
{
    echo "<script>
    
    window.location.href='officers-list.php';
    </script>";
}
else 
{
    echo "<script>
    
    window.location.href='officers-list.php';
    </script>";
}



?>