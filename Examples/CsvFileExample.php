<?php
require_once("PHPReader/PhpReader.php");

$reader = PhpReader::getReader("../Test/Files/test.csv");
$header = $reader->getHeaderRow();
echo implode(",", $header) . "\n";
foreach ($reader as $rowNumber => $data) {
	echo implode(",", $data) . "\n";
}