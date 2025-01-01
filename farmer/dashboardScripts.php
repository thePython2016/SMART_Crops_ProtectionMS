<?php

session_start();
if(!isset($_SESSION['username']))
{
  echo "
  <script>
  window.location.href='../index.php';
  </script>
  ";
}

?>
<?php

// Farmers count
require 'connection.php';
$countFarmers=mysqli_query($conn,"select count(mobileNumber) as farmersCount from farmers  ");

foreach($countFarmers as $count)
{
    $farmersCount=$count['farmersCount'];
 
}


// Agro in puts
$countInputs=mysqli_query($conn,"select count(inputsNumber) as inputsCount from agroinputs  ");

foreach($countInputs as $count)
{
    $inputs=$count['inputsCount'];
  
}


// Officers
$countOfficers=mysqli_query($conn,"select count(mobileNumber)  as officersCount from agroofficers  ");

foreach($countOfficers as $count)
{
    $officers=$count['officersCount'];
   
}
// Farmers by region
$selectByregion=mysqli_query($conn,"select region,count(mobileNumber) as farmers from farmers GROUP BY region");
// $executeQuery=mysqli_query($conn,$selectByregion);
foreach($selectByregion as $data)
{
    $region[]=$data['region'];
    $farmers[]=$data['farmers'];
}

// Officers by region
$officersByregion=mysqli_query($conn,"select address,count(mobileNumber) as officers from agroofficers GROUP BY address");
// $executeQuery=mysqli_query($conn,$selectByregion);
foreach($officersByregion as $data2)
{
    $address[]=$data2['address'];
    $officerCount[]=$data2['officers'];
}


?>