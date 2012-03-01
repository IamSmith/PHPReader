<?php
/**
 * Interface that all reader classes should inherit.
 *
 * @author Tom Smith <tom.smith@clock.co.uk>
 * @copyright Clock Limited 2012
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
interface IReader {

	public function __construct($pathToFile, $options);

	public function getRow();

	public function getHeaderRow();

}