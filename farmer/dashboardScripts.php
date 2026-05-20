<?php

$appBootstrap = __DIR__ . '/../includes/app.php';
if (!is_file($appBootstrap)) {
    $appBootstrap = __DIR__ . '/../user/includes/app.php';
}
require_once $appBootstrap;
app_session_start();
if (!isset($_SESSION['username'])) {
    app_redirect_login();
}

// Farmers count
require 'connection.php';

$farmersCount = 0;
$inputs = 0;
$officers = 0;
$region = [];
$farmers = [];
$address = [];
$officerCount = [];

$countFarmers=db_query($conn,"select count(mobileNumber) as farmersCount from farmers  ");

foreach($countFarmers as $count)
{
    $farmersCount = (int) ($count['farmersCount'] ?? 0);
}


// Agro in puts
$countInputs=db_query($conn,"select count(inputsNumber) as inputsCount from agroinputs  ");

foreach($countInputs as $count)
{
    $inputs = (int) ($count['inputsCount'] ?? 0);
}


// Officers
$countOfficers=db_query($conn,"select count(mobileNumber)  as officersCount from agroofficers  ");

foreach($countOfficers as $count)
{
    $officers = (int) ($count['officersCount'] ?? 0);
}
// Farmers by region
$selectByregion=db_query($conn,"select region,count(mobileNumber) as farmers from farmers GROUP BY region");
// $executeQuery=db_query($conn,$selectByregion);
foreach($selectByregion as $data)
{
    $region[]=$data['region'];
    $farmers[]=$data['farmers'];
}

// Officers by region
$officersByregion=db_query($conn,"select address,count(mobileNumber) as officers from agroofficers GROUP BY address");
// $executeQuery=db_query($conn,$selectByregion);
foreach($officersByregion as $data2)
{
    $address[]=$data2['address'];
    $officerCount[]=$data2['officers'];
}
