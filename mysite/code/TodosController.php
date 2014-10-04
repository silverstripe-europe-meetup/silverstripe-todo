<?php
/**
 * Created by PhpStorm.
 * User: Raket
 * Date: 2014-10-03
 * Time: 00:34
 */

class TodosController extends RestController {
	public function index() {
		$todos = Todo::get()->sort('Created DESC')->toNestedArray();
		for ($i = 0; $i < count($todos); $i++) {
			$todos[$i]["Completed"] = (bool)$todos[$i]["Completed"];
		}
		return $todos;
	}

	public function show($id) {
		return [$id];
	}

	public function store() {
		return json_decode(file_get_contents('php://input'), true);
	}
} 