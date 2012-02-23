<?php
require_once("IReader.php");

class CsvReader implements IReader, Iterator {

	private $handle;
	private $current = null;
	private $key = 0;
	private $header = array();
	private $row;
	protected $delimiter = ",";

	public function __construct($pathToFile) {
		$this->handle = fopen($pathToFile, "r");
		$this->header = $this->getRow();
	}

	public function key() {
		return $this->key;
	}

	public function current() {
		$this->current = array_combine($this->header, $this->row);
		return $this->current;
	}

	public function next() {
		++$this->key;
	}

	public function valid() {
		$this->row = $this->getRow();
		return ($this->row) ? true : false;
	}

	public function rewind() {
		rewind($this->handle);
		$this->key = 0;
		$header = $this->getRow();;
	}

	private function getRow() {
		return fgetcsv($this->handle, 8096, $this->delimiter);
	}
}