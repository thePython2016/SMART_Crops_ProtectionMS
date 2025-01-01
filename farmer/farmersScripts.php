<?php 
require 'connection.php';
if(isset($_POST["submit"]))
{
  

// $currentdate=date('Y-m-d');

$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$mname=mysqli_real_escape_string($conn,$_POST['mname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$region=mysqli_real_escape_string($conn,$_POST['region']);
$year=mysqli_real_escape_string($conn,$_POST['birthYear']);
$month=mysqli_real_escape_string($conn,$_POST['birthMonth']);
$day=mysqli_real_escape_string($conn,$_POST['birthDay']);


// INSERT TO TABLE
$insertFarmers="insert into farmers(mobileNumber,email,fname,mname,lname,gender,birthDay,
birthMonth,birthYear,region) values('$phone','$email','$fname','$mname','$lname','$gender','$day'
,'$month','$year','$region')";

$farmersQuery=mysqli_query($conn,$insertFarmers);

// $count=mysqli_num_rows($farmersQuery);

if($farmersQuery)
{
  $_SESSION['addedFarmer']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One Farmer added</p>";
  echo "<script>
  window.location.href='farmers.php'
  </script>";
  
  
  
}
else{
  $_SESSION['addingFarmerError']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error </p>";
}



}
?>