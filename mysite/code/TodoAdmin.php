<?php
/**
 * Created by PhpStorm.
 * User: Raket
 * Date: 2014-10-03
 * Time: 00:48
 */

class TodoAdmin extends ModelAdmin {
	public static $managed_models = ["Todo"]; // Can manage multiple models
	static $url_segment = 'todos'; // Linked as /admin/products/
	static $menu_title = 'Todo Items';
} 