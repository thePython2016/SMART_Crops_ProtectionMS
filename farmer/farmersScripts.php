<?php

require 'connection.php';
require_once __DIR__ . '/../includes/flash.php';

if (isset($_POST['submit'])) {
    $phone = db_escape($conn, $_POST['phone']);
    $email = db_escape($conn, $_POST['email']);
    $fname = db_escape($conn, $_POST['fname']);
    $mname = db_escape($conn, $_POST['mname']);
    $lname = db_escape($conn, $_POST['lname']);
    $gender = db_escape($conn, $_POST['gender']);
    $region = db_escape($conn, $_POST['region']);
    $year = db_escape($conn, $_POST['birthYear']);
    $month = db_escape($conn, $_POST['birthMonth']);
    $day = db_escape($conn, $_POST['birthDay']);

    $insertFarmers = "insert into farmers(mobileNumber,email,fname,mname,lname,gender,birthDay,
birthMonth,birthYear,region) values('$phone','$email','$fname','$mname','$lname','$gender','$day'
,'$month','$year','$region')";

    if (db_query($conn, $insertFarmers)) {
        app_flash_success('Farmer added successfully.');
    } else {
        app_flash_error('Could not add farmer. Please try again.');
    }

    echo "<script>window.location.href='farmers.php';</script>";
    exit;
}
