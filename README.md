# PHP Reader

Allows you to iterate through a file and read each line by line and parse each row into an array regardless of file type.

It will use the file extension to determine the file type. Using the files mime type to determine its type is unreliable across all systems.

## Supported File Extensions:

* CSV - Comma Seperated Value
* PSV - Pipe (|) Seperated Value
* XLS - Excel document
* XLSX - Excel 2007 document

## PHP Excel

In order to handle the Excel file types PHP Reader will use the PHPExcel pear package.

PHPExcel Links:

* [Homepage](http://phpexcel.codeplex.com/)
* [Download](http://phpexcel.codeplex.com/releases/view/45412).
* [Documentation](http://phpexcel.codeplex.com/releases/view/45412)
* [Cheat Sheet](http://blog.clock.co.uk/2011/04/08/phpexcel-cheatsheet/)

## Credits
[Tom Smith](https://github.com/iamsmith/)

## Licence
Licenced under the [New BSD License](http://opensource.org/licenses/bsd-license.php)