<?php
require_once __DIR__ . '/auth_guard.php';
require('connection.php');
require_once __DIR__ . '/../includes/flash.php';
require_once __DIR__ . '/../includes/pg_duplicate.php';
use SimpleExcel\SimpleExcel;

if (isset($_POST['importInputs'])) {
    $uploadedTmp = $_FILES['inputs-file']['tmp_name'] ?? '';
    if ($uploadedTmp === '' || !is_uploaded_file($uploadedTmp)) {
        app_flash_error('Please choose a valid CSV file to upload.');
        app_redirect('agroinputs.php');
    }

    require_once('SimpleExcel/SimpleExcel.php');
    $csvPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('inputs_', true) . '.csv';

    try {
        if (!copy($uploadedTmp, $csvPath)) {
            app_flash_error('Upload failed. Please try again.');
            app_redirect('agroinputs.php');
        }

        $excel = new SimpleExcel('csv');
        $excel->parser->loadFile($csvPath);
        $rows = $excel->parser->getField();

        $imported = 0;
        $duplicates = 0;
        $failed = 0;

        for ($count = 1; $count < count($rows); $count++) {
            $id = db_escape($conn, $rows[$count][0] ?? '');
            $name = db_escape($conn, $rows[$count][1] ?? '');
            $category = db_escape($conn, $rows[$count][2] ?? '');
            $usage = db_escape($conn, $rows[$count][3] ?? '');

            if ($id === '' || $name === '') {
                continue;
            }

            $insertInputs = db_query($conn, "insert into agroinputs(inputsNumber,name,category,usage_)
            values('$id','$name','$category','$usage')");

            if ($insertInputs) {
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
            app_flash_success("Agro-inputs imported successfully ({$imported} rows).");
        } elseif ($imported > 0 && ($duplicates > 0 || $failed > 0)) {
            app_flash_error("Imported {$imported} rows. Skipped {$duplicates} duplicate row(s) and {$failed} invalid row(s).");
        } elseif ($duplicates > 0 && $failed === 0) {
            app_flash_error("No new records imported. {$duplicates} row(s) already exist.");
        } else {
            app_flash_error('No agro-inputs were imported. Please verify the CSV content and format.');
        }
    } catch (Throwable $e) {
        app_flash_error('Could not import agro-inputs CSV. Please ensure the file is valid.');
    } finally {
        @unlink($csvPath);
    }
    app_redirect('agroinputs.php');
}