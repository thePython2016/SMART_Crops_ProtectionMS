<?php
require_once __DIR__ . '/includes/auth_guard.php';
require('connection.php');
require_once __DIR__ . '/includes/flash.php';
require_once dirname(__DIR__) . '/includes/pg_duplicate.php';
use SimpleExcel\SimpleExcel;

if (isset($_POST['importOfficers'])) {
    $uploadedTmp = $_FILES['officers-file']['tmp_name'] ?? '';
    if ($uploadedTmp === '' || !is_uploaded_file($uploadedTmp)) {
        app_flash_error('Please choose a valid CSV file to upload.');
        app_redirect('officers.php');
    }

    require_once('SimpleExcel/SimpleExcel.php');
    $csvPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('officers_', true) . '.csv';

    try {
        if (!copy($uploadedTmp, $csvPath)) {
            app_flash_error('Upload failed. Please try again.');
            app_redirect('officers.php');
        }

        $excel = new SimpleExcel('csv');
        $excel->parser->loadFile($csvPath);
        $rows = $excel->parser->getField();

        $imported = 0;
        $duplicates = 0;
        $failed = 0;

        for ($count = 1; $count < count($rows); $count++) {
            $phone = db_escape($conn, $rows[$count][0] ?? '');
            $occupation = db_escape($conn, $rows[$count][1] ?? '');
            $fname = db_escape($conn, $rows[$count][2] ?? '');
            $mname = db_escape($conn, $rows[$count][3] ?? '');
            $lname = db_escape($conn, $rows[$count][4] ?? '');
            $gender = db_escape($conn, $rows[$count][5] ?? '');
            $day = db_escape($conn, $rows[$count][6] ?? '');
            $month = db_escape($conn, $rows[$count][7] ?? '');
            $year = db_escape($conn, $rows[$count][8] ?? '');
            $address = db_escape($conn, $rows[$count][9] ?? '');

            if ($phone === '' || $fname === '') {
                continue;
            }

            $insertOfficers = "insert into agroofficers(mobileNumber,occupation,fname,mname,lname,gender,birthDay,
            birthMonth,birthYear,address) values('$phone','$occupation','$fname','$mname','$lname','$gender','$day'
            ,'$month','$year','$address')";

            if (db_query($conn, $insertOfficers)) {
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
            app_flash_success("Agricultural officers imported successfully ({$imported} rows).");
        } elseif ($imported > 0 && ($duplicates > 0 || $failed > 0)) {
            app_flash_error("Imported {$imported} rows. Skipped {$duplicates} duplicate row(s) and {$failed} invalid row(s).");
        } elseif ($duplicates > 0 && $failed === 0) {
            app_flash_error("No new records imported. {$duplicates} row(s) already exist.");
        } else {
            app_flash_error('No officers were imported. Please verify the CSV content and format.');
        }
    } catch (Throwable $e) {
        app_flash_error('Could not import officers CSV. Please ensure the file is valid.');
    } finally {
        @unlink($csvPath);
    }
    app_redirect('officers.php');
}