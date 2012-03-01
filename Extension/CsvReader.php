<?php
require_once("IReader.php");

/**
 * Csv Reader
 *
 * @author Tom Smith <tom.smith@clock.co.uk>
 * @copyright Clock Limited 2012
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class CsvReader implements IReader, Iterator {

	private $includeHeader = true;
	private $handle;
	private $current = null;
	private $key = 0;
	private $header = array();
	private $row;
	protected $delimiter = ",";

	public function __construct($pathToFile, $options) {
		$this->handle = fopen($pathToFile, "r");
		if (!in_array(PHPReader::OPTION_IGNORE_HEADER_ROW, $options)) {
			$this->header = $this->getRow();
		} else {
			$this->includeHeader = false;
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
		return $this->key;
	}

	public function current() {
		if ($this->includeHeader) {
			$this->current = array_combine($this->header, $this->row);
		} else {
			$this->current = $this->row;
		}
		return $this->current;
	}

	public function next() {
		++$this->key;
	}

	public function valid() {
		$this->row = $this->getRow();
		return ($this->row);
	}

	public function rewind() {
		rewind($this->handle);
		$this->key = 0;
		if ($this->includeHeader) {
			$this->header = $this->getRow();
		}
	}

	public function getRow() {
		return fgetcsv($this->handle, 8096, $this->delimiter);
	}
}