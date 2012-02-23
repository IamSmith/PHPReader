<?php
require_once("CsvReader.php");

class PsvReader implements CsvReader {

	public function __construct($pathToFile) {
		$this->delimiter = "|";
		parent::__construct($pathToFile);
	}
}