/*global angular */

/**
 * Services that persists and retrieves TODOs from localStorage
 */
angular.module('todomvc')
	.factory('todoStorage', function ($http) {
		'use strict';

		var STORAGE_ID = 'todos-angularjs';

		return {
			get: function () {
				return JSON.parse(localStorage.getItem(STORAGE_ID) || '[]');
			},
			getAll: function() {
				return 	$http.get("/api/todos");
			},
			put: function (todos) {
				localStorage.setItem(STORAGE_ID, JSON.stringify(todos));
			},
			addTodo: function(todo) {
				return $http.post("/api/todos", todo);
			}
		};
	});
