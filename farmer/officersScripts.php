<?php 
require 'connection.php';
if(isset($_POST["submit"]))
{
  

// $currentdate=date('Y-m-d');

$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$occupation=mysqli_real_escape_string($conn,$_POST['occupation']);
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$mname=mysqli_real_escape_string($conn,$_POST['mname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$year=mysqli_real_escape_string($conn,$_POST['year']);
$month=mysqli_real_escape_string($conn,$_POST['month']);
$day=mysqli_real_escape_string($conn,$_POST['day']);


// INSERT TO TABLE
$insertOfficers="insert into agroofficers (mobileNumber,occupation,fname,mname,lname,gender,birthDay,
birthMonth,birthYear,address) values('$phone','$occupation','$fname','$mname','$lname','$gender','$day'
,'$month','$year','$address')";

$officersQuery=mysqli_query($conn,$insertOfficers);

// $count=mysqli_num_rows($farmersQuery);

if($officersQuery)
{
  $_SESSION['addedFarmer']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One Farmer added</p>";
  echo "<script>
  window.location.href='officers.php'
  </script>";
  
  
  
}
else{
  $_SESSION['addingFarmerError']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error </p>";
}



}
?>