<?php
require_once("CsvReader.php");

/**
 * Psv Reader
 *
 * @author Tom Smith <tom.smith@clock.co.uk>
 * @copyright Clock Limited 2012
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class PsvReader extends CsvReader {

	public function __construct($pathToFile, $options) {
		$this->delimiter = "|";
		parent::__construct($pathToFile, $options);
	}
}