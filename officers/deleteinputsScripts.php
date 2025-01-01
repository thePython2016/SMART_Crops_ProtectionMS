<?php

require "connection.php";
$id=$_GET['id'];
  
$delete=mysqli_query($conn,"delete from agroinputs where inputsNumber='$id'");
if($delete)
{
    echo "<script>
    
    window.location.href='agroinputs-list.php';
    </script>";
}
else 
{
    echo "<script>
    
    window.location.href='agroinputs-list.php';
    </script>";
}



?>