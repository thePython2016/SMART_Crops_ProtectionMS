<?php

require 'connection.php';
require_once __DIR__ . '/../includes/flash.php';

if (isset($_POST['submit'])) {
    $id = db_escape($conn, $_POST['inputid']);
    $name = db_escape($conn, $_POST['inputname']);
    $category = db_escape($conn, $_POST['inputcategory']);
    $usage = db_escape($conn, $_POST['inputusage']);

    $insertInputs = db_query($conn, "insert into agroinputs(inputsNumber,name,category,usage_)
 values('$id','$name','$category','$usage')");

    if ($insertInputs) {
        app_flash_success('Agro input added successfully.');
    } else {
        app_flash_error('Could not add agro input. Please try again.');
    }

    echo "<script>window.location.href='agroinputs.php';</script>";
    exit;
}
