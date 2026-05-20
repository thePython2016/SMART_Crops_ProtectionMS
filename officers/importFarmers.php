<?php
require_once __DIR__ . '/auth_guard.php';
require('connection.php');
require_once __DIR__ . '/../includes/flash.php';
require_once __DIR__ . '/../includes/pg_duplicate.php';
use SimpleExcel\SimpleExcel;

if (isset($_POST['importFarmers'])) {
    $uploadedTmp = $_FILES['farmers_file']['tmp_name'] ?? '';
    if ($uploadedTmp === '' || !is_uploaded_file($uploadedTmp)) {
        app_flash_error('Please choose a valid CSV file to upload.');
        app_redirect('farmers.php');
    }

    require_once('SimpleExcel/SimpleExcel.php');
    $csvPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('farmers_', true) . '.csv';

    try {
        if (!copy($uploadedTmp, $csvPath)) {
            app_flash_error('Upload failed. Please try again.');
            app_redirect('farmers.php');
        }

        $excel = new SimpleExcel('csv');
        $excel->parser->loadFile($csvPath);
        $rows = $excel->parser->getField();

        $imported = 0;
        $duplicates = 0;
        $failed = 0;

        for ($count = 1; $count < count($rows); $count++) {
            $phone = db_escape($conn, $rows[$count][0] ?? '');
            $fname = db_escape($conn, $rows[$count][1] ?? '');
            $mname = db_escape($conn, $rows[$count][2] ?? '');
            $lname = db_escape($conn, $rows[$count][3] ?? '');
            $gender = db_escape($conn, $rows[$count][4] ?? '');
            $day = db_escape($conn, $rows[$count][5] ?? '');
            $month = db_escape($conn, $rows[$count][6] ?? '');
            $year = db_escape($conn, $rows[$count][7] ?? '');
            $region = db_escape($conn, $rows[$count][8] ?? '');

            if ($phone === '' || $fname === '') {
                continue;
            }

            $insertFarmers = "insert into farmers(mobileNumber,fname,mname,lname,gender,birthDay,
            birthMonth,birthYear,region) values('$phone','$fname','$mname','$lname','$gender','$day'
            ,'$month','$year','$region')";

            if (db_query($conn, $insertFarmers)) {
                $imported++;
                continue;
            }

            $err = db_last_error_message($conn);
            if (db_pg_error_is_unique_violation($err)) {
                $duplicates++;
                continue;
            }

            $failed++;
        }

        if ($imported > 0 && $duplicates === 0 && $failed === 0) {
            app_flash_success("Farmers imported successfully ({$imported} rows).");
        } elseif ($imported > 0 && ($duplicates > 0 || $failed > 0)) {
            app_flash_error("Imported {$imported} rows. Skipped {$duplicates} duplicate row(s) and {$failed} invalid row(s).");
        } elseif ($duplicates > 0 && $failed === 0) {
            app_flash_error("No new records imported. {$duplicates} row(s) already exist.");
        } else {
            app_flash_error('No farmers were imported. Please verify the CSV content and format.');
        }
    } catch (Throwable $e) {
        app_flash_error('Could not import farmers CSV. Please ensure the file is a valid CSV.');
    } finally {
        @unlink($csvPath);
    }
    app_redirect('farmers.php');
}