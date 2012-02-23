<?php

class ExtensionFactory {

	static public function __callStatic($name, $arguements) {
		$class = $name . "Reader";
		if (!file_exists(__DIR__ . "/$class.php")) {
			throw new InvalidFileTypeException("'$name' is not a valid extension, the class for this extension would need to be added.");
		}
		require_once("$class.php");
		return new $class($arguements[0]);
	}
}