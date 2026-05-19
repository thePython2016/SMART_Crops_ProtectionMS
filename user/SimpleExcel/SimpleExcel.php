<?php
/**
 * Minimal SimpleExcel (CSV) for crops2 imports.
 * Compatible with faisalman/simple-excel-php usage in import scripts.
 */

namespace SimpleExcel\Exception;

class SimpleExcelException extends \Exception
{
    const FILE_NOT_FOUND = 1;
    const FILE_EXTENSION_MISMATCH = 2;
    const ERROR_READING_FILE = 3;
    const FILETYPE_NOT_SUPPORTED = 4;
    const FIELD_NOT_FOUND = 5;
    const ROW_NOT_FOUND = 6;
    const COLUMN_NOT_FOUND = 7;
    const CELL_NOT_FOUND = 8;
}

namespace SimpleExcel\Parser;

use SimpleExcel\Exception\SimpleExcelException;

class CSVParser
{
    public $table_arr = array();
    public $file_extension = 'csv';
    protected $delimiter;

    public function loadFile($file_path)
    {
        if (!$this->isFileReady($file_path)) {
            return;
        }
        $this->loadString(file_get_contents($file_path));
    }

    public function loadString($str)
    {
        $this->table_arr = array();
        $pattern = "/\r\n|\n|\r/";
        $lines = preg_split($pattern, $str, -1, PREG_SPLIT_NO_EMPTY);
        if (count($lines) === 0) {
            return;
        }

        $line = $lines[0];
        if (!isset($this->delimiter)) {
            $separators = array(';' => 0, ',' => 0);
            foreach ($separators as $sep => $count) {
                $args = str_getcsv($line, $sep);
                $separators[$sep] = count($args);
            }
            $this->delimiter = ($separators[';'] > $separators[',']) ? ';' : ',';
        }

        $max = 0;
        $min = PHP_INT_MAX;
        $sep = $this->delimiter;
        $rows = array();
        foreach ($lines as $line) {
            $args = str_getcsv($line, $sep);
            $rows[] = $args;
            $cols = count($args);
            if ($cols > $max) {
                $max = $cols;
            }
            if ($cols < $min) {
                $min = $cols;
            }
        }

        if ($min != $max) {
            foreach ($rows as $i => $row) {
                $c = count($row);
                while ($c < $max) {
                    $row[] = '';
                    $c++;
                }
                $rows[$i] = $row;
            }
        }
        $this->table_arr = $rows;
    }

    public function getField($val_only = true)
    {
        if (!isset($this->table_arr)) {
            throw new \Exception('Field is not set', SimpleExcelException::FIELD_NOT_FOUND);
        }
        return $this->table_arr;
    }

    public function isFileReady($file_path)
    {
        if (!file_exists($file_path)) {
            throw new \Exception('File ' . $file_path . ' doesn\'t exist', SimpleExcelException::FILE_NOT_FOUND);
        }
        if (strtoupper(pathinfo($file_path, PATHINFO_EXTENSION)) != strtoupper($this->file_extension)) {
            throw new \Exception(
                'File extension ' . strtoupper(pathinfo($file_path, PATHINFO_EXTENSION)) .
                ' doesn\'t match with ' . $this->file_extension,
                SimpleExcelException::FILE_EXTENSION_MISMATCH
            );
        }
        if (($handle = fopen($file_path, 'r')) === false) {
            throw new \Exception('Error reading the file in ' . $file_path, SimpleExcelException::ERROR_READING_FILE);
        }
        fclose($handle);
        return true;
    }
}

namespace SimpleExcel\Writer;

class CSVWriter
{
    public $tabl_data = array();
}

namespace SimpleExcel;

use SimpleExcel\Exception\SimpleExcelException;
use SimpleExcel\Parser\CSVParser;
use SimpleExcel\Writer\CSVWriter;

class SimpleExcel
{
    public $parser;
    public $writer;

    public function __construct($filetype = 'csv')
    {
        $filetype = strtoupper($filetype);
        if ($filetype !== 'CSV') {
            throw new \Exception('Filetype ' . $filetype . ' is not supported', SimpleExcelException::FILETYPE_NOT_SUPPORTED);
        }
        $this->parser = new CSVParser();
        $this->writer = new CSVWriter();
    }
}
