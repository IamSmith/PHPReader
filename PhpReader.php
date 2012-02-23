<?php
require_once("Extension/ExtensionFactory.php");
require_once("Exception/FileDoesntExistException.php");
require_once("Exception/InvalidFileTypeException.php");

class PhpReader {

	static function getReader($pathToFile) {
		$options = func_get_args();

		if (!file_exists($pathToFile)) {
			throw new FileDoesntExistException("'$pathToFile' doesn't exist");
		}

		$extension = PhpReader::determineFileType($pathToFile);
		$className = ucfirst($extension);

		return ExtensionFactory::$className($pathToFile);
	}

	private static function determineFileType($pathToFile) {
		$fileParts = pathinfo($pathToFile);
		if (isset($fileParts["extension"])) {
			return strtolower($fileParts["extension"]);
		} else {
			throw new InvalidFileTypeException("'" . $pathToFile . "' doesnt have a file extensions.");
		}
	}
}
