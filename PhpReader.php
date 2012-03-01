<?php
require_once("Extension/ExtensionFactory.php");
require_once("Exception/FileDoesntExistException.php");
require_once("Exception/InvalidFileTypeException.php");

/**
 * Global class for instantiating a reader class based on the file type
 *
 * @author Tom Smith <tom.smith@clock.co.uk>
 * @copyright Clock Limited 2012
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class PhpReader {

	const OPTION_IGNORE_HEADER_ROW = 1;

	static function getReader($pathToFile) {
		$options = func_get_args();

		if (!file_exists($pathToFile)) {
			throw new FileDoesntExistException("'$pathToFile' doesn't exist");
		}

		$extension = PhpReader::determineFileType($pathToFile);
		$className = ucfirst($extension);

		return ExtensionFactory::$className($pathToFile, $options);
	}

	private static function determineFileType($pathToFile) {
		$fileParts = pathinfo($pathToFile);
		if (isset($fileParts["extension"])) {
			return strtolower($fileParts["extension"]);
		} else {
			throw new InvalidFileTypeException("'" . $pathToFile . "' doesn't have a file extensions.");
		}
	}
}
