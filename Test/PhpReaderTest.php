<?php
class PhpReaderTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {
		require_once("PhpReader.php");
	}

	/**
	* @expectedException FileDoesntExistException
	*/
	public function testFileDoesntExistException() {
		$reader = PhpReader::getReader("Test/Files/test.php");
	}

	/**
	* @expectedException InvalidFileTypeException
	*/
	public function testInvalidFileTypeException() {
		$reader = PhpReader::getReader("Test/Files/test.txt");
	}

	public function testCorrectReaderIsReturned() {

		$reader = PhpReader::getReader("Test/Files/test.csv");
		$this->assertEquals("CsvReader", get_class($reader));

		$reader = PhpReader::getReader("Test/Files/test.xls");
		$this->assertEquals("XlsReader", get_class($reader));

		$reader = PhpReader::getReader("Test/Files/test.xlsx");
		$this->assertEquals("XlsxReader", get_class($reader));

		$reader = PhpReader::getReader("Test/Files/test.psv");
		$this->assertEquals("PsvReader", get_class($reader));
	}

	public function testCsvReaderWithHeader() {
		$reader = PhpReader::getReader("Test/Files/test.csv");
		foreach ($reader as $rowNumber => $rowData) {

		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	public function testCsvReaderWithoutHeader() {
		$reader = PhpReader::getReader("Test/Files/test.csv", PhpReader::OPTION_IGNORE_HEADER_ROW);
		foreach ($reader as $rowNumber => $rowData) {
		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	public function testPsvReaderWithHeader() {
		$reader = PhpReader::getReader("Test/Files/test.psv");
		foreach ($reader as $rowNumber => $rowData) {

		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	public function testPsvReaderWithoutHeader() {
		$reader = PhpReader::getReader("Test/Files/test.psv", PhpReader::OPTION_IGNORE_HEADER_ROW);
		foreach ($reader as $rowNumber => $rowData) {

		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	public function testXlsReaderWithHeader() {
		$reader = PhpReader::getReader("Test/Files/test.xls");
		foreach ($reader as $rowNumber => $rowData) {

		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	public function testXlsReaderWithoutHeader() {
		$reader = PhpReader::getReader("Test/Files/test.xls", PhpReader::OPTION_IGNORE_HEADER_ROW);
		foreach ($reader as $rowNumber => $rowData) {

		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	public function testXlsxReaderWithHeader() {
		$reader = PhpReader::getReader("Test/Files/test.xlsx");
		foreach ($reader as $rowNumber => $rowData) {

		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	public function testXlsxReaderWithoutHeader() {
		$reader = PhpReader::getReader("Test/Files/test.xlsx", PhpReader::OPTION_IGNORE_HEADER_ROW);
		foreach ($reader as $rowNumber => $rowData) {

		}
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	public function testLargeXlsxFile() {
		$startTime = time();
		$reader = PhpReader::getReader("Test/Files/large-test.xlsx");
		foreach ($reader as $rowNumber => $rowData) {

		}
		$timeTaken = time() - $startTime;

		$this->assertLessThan(10, $timeTaken);
	}

	public function testExtensionOverrideFile() {
		$reader = PhpReader::getReader("Test/Files/testFileNoExtension", "csv");
		foreach ($reader as $rowNumber => $rowData) {

		}
	}

}