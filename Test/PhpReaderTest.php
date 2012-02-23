<?php
class PhpReaderTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {
		require_once("/var/application/PHPReader/PhpReader.php");
	}

	/**
	* @expectedException FileDoesntExistException
	*/
	public function testFileDoesntExistException() {
		$reader = PhpReader::getReader("Files/test.php");
	}

	/**
	* @expectedException InvalidFileTypeException
	*/
	public function testInvalidFileTypeException() {
		$reader = PhpReader::getReader("Files/test.txt");
	}

	public function testCorrectReaderIsReturned() {

		$reader = PhpReader::getReader("Files/test.csv");
		$this->assertEquals("CsvReader", get_class($reader));

		$reader = PhpReader::getReader("Files/test.xls");
		$this->assertEquals("XlsReader", get_class($reader));

		$reader = PhpReader::getReader("Files/test.xlsx");
		$this->assertEquals("XlsxReader", get_class($reader));
	}

	public function testCsvReader() {
		$reader = PhpReader::getReader("Files/test.csv");
		foreach ($reader as $rowNumber => $rowData) {

		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}
}