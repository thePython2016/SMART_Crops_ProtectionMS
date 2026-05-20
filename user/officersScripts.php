<?php

require 'connection.php';
require_once __DIR__ . '/includes/flash.php';
require_once dirname(__DIR__) . '/includes/pg_duplicate.php';

if (isset($_POST['submit'])) {
    $phone = db_escape($conn, $_POST['phone']);
    $occupation = db_escape($conn, $_POST['occupation']);
    $fname = db_escape($conn, $_POST['fname']);
    $mname = db_escape($conn, $_POST['mname']);
    $lname = db_escape($conn, $_POST['lname']);
    $gender = db_escape($conn, $_POST['gender']);
    $address = db_escape($conn, $_POST['address']);
    $year = db_escape($conn, $_POST['year']);
    $month = db_escape($conn, $_POST['month']);
    $day = db_escape($conn, $_POST['day']);

    $insertOfficers = "insert into agroofficers (mobileNumber,occupation,fname,mname,lname,gender,birthDay,
birthMonth,birthYear,address) values('$phone','$occupation','$fname','$mname','$lname','$gender','$day'
,'$month','$year','$address')";

    if (db_query($conn, $insertOfficers)) {
        app_flash_success('Officer added successfully.');
    } else {
        $err = db_last_error_message($conn);
        app_flash_from_pg_insert_error($err, [
            'mobilenumber' => 'phone',
        ], 'Could not add officer. Please try again.');
    }

    echo "<script>window.location.href='officers.php';</script>";
    exit;
}
