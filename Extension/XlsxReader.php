<?php
require_once("XlsReader.php");

/**
 * Xlsx Reader
 *
 * @author Tom Smith <tom.smith@clock.co.uk>
 * @copyright Clock Limited 2012
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class XlsxReader extends XlsReader {

	public function __construct($pathToFile, $options) {
		$this->reader = new PHPExcel_Reader_Excel2007();
		parent::__construct($pathToFile, $options);
	}

}