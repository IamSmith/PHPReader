<?php
require_once("IReader.php");
require_once("PHPExcel/PHPExcel.php");

/**
 * Xls Reader
 *
 * @author Tom Smith <tom.smith@clock.co.uk>
 * @copyright Clock Limited 2012
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class XlsReader implements IReader, Iterator {

	protected $includeHeader = true;

	protected $file;
	protected $reader;
	protected $excelFile;

	protected $position = 1;
	protected $interval = 1;
	protected $maxRow = 0;

	protected $header = array();
	protected $rows = array();

	public function __construct($pathToFile, $options) {
		$this->file = $pathToFile;

		if (($this->reader == null) || (!is_a($this->reader, "PHPExcel_Reader_IReader"))) {
			$this->reader = new PHPExcel_Reader_Excel5();
		}

		if (!in_array(PHPReader::OPTION_IGNORE_HEADER_ROW, $options)) {
			$this->loadFile();
			$this->header = $this->rows[1];
		} else {
			$this->includeHeader = false;
			$this->loadFile();
			$this->maxRow = $this->excelFile->getActiveSheet()->getHighestRow();
		}
	}

	public function getHeaderRow() {
		if ($this->includeHeader) {
			return $this->header;
		} else {
			return array();
		}
	}

	public function key() {
		return $this->position;
	}

	public function current() {
		if ($this->includeHeader) {
			$this->current = array_combine($this->header, $this->rows[$this->position]);
		} else {
			$this->current = $this->rows[$this->position];
		}
		return $this->current;
	}

	public function next() {
		$this->position++;
	}

	public function valid() {
		return isset($this->rows[$this->position]);
	}

	public function rewind() {
		if ($this->includeHeader) {
			$this->position = 2;
		} else {
			$this->position = 1;
		}

	}

	public function getRow() {

	}

	public function loadfile() {
		if ($this->excelFile == null) {
			$this->excelFile = $this->reader->load($this->file);
			$this->rows = $this->excelFile->getActiveSheet()->toArray(null, true, true, true);
		}
	}
}

class RowByRowFilter implements PHPExcel_Reader_IReadFilter {
	protected $startRow = 0;
	protected $endRow = 0;

	/**  Set the list of rows that we want to read  */
	public function setRows($startRow, $chunkSize) {
		$this->startRow = $startRow;
		$this->endRow = $startRow + $chunkSize;
	}

	public function readCell($column, $row, $worksheetName = "") {
		//  Only read the heading row, and the rows that are configured in $this->startRow and $this->endRow
		if (($row >= $this->startRow && $row < $this->endRow)) {
			return true;
		}
		return false;
	}
}