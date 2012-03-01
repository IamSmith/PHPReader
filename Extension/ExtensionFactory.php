<?php
/**
 * Factory class to load the relevant reader class.
 *
 * Classes should be in the format <type>Reader. E.g CsvReader
 *
 * @author Tom Smith <tom.smith@clock.co.uk>
 * @copyright Clock Limited 2012
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class ExtensionFactory {

	static public function __callStatic($name, $arguements) {
		$class = $name . "Reader";
		if (!file_exists(__DIR__ . "/$class.php")) {
			throw new InvalidFileTypeException("'$name' is not a valid extension, the class for this extension would need to be added.");
		}
		require_once("$class.php");
		return new $class($arguements[0], $arguements[1]);
	}
}