<?php
require 'connection.php';
if(isset($_POST["submit"]))
{
  

// $currentdate=date('Y-m-d');

$id=mysqli_real_escape_string($conn,$_POST['inputid']);
$name=mysqli_real_escape_string($conn,$_POST['inputname']);
$category=mysqli_real_escape_string($conn,$_POST['inputcategory']);
$usage=mysqli_real_escape_string($conn,$_POST['inputusage']);



// INSERT TO TABLE
$insertInputs=mysqli_query($conn,"insert into agroinputs(inputsNumber,name,category,usage_)
 values('$id','$name','$category','$usage')");



// $count=mysqli_num_rows($farmersQuery);

if($insertInputs)
{
  $_SESSION['addedFarmer']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One Farmer added</p>";
  echo "<script>
  window.location.href='agroinputs.php'
  </script>";
  

  
}
else{

  $_SESSION['addingFarmerError']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error </p>";
}



}
?>