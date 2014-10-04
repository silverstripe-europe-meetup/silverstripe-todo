<?php
/**
 * Created by PhpStorm.
 * User: Raket
 * Date: 2014-10-03
 * Time: 00:36
 */

/**
 * @property integer $ID
 * @property string $ClassName
 * @property string $Title
 * @property boolean $Completed
 * @property SS_Datetime $Created
 * @property SS_Datetime $LastEdited
 */
class Todo extends DataObject {

	private static $db = [
		"Title" => "Varchar",
		"Completed" => "Boolean"
	];
}