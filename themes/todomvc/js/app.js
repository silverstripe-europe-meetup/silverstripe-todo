/*global angular */

/**
 * The main TodoMVC app module
 *
 * @type {angular.Module}
 */
angular.module('todomvc', ['ngRoute'])
	.config(function ($routeProvider, $locationProvider) {
		'use strict';

		$locationProvider.html5Mode(true);

		$routeProvider.when('/', {
			controller: 'TodoCtrl',
			templateUrl: '/themes/todomvc/js/templates/todo.html'
		}).when('/:status', {
			controller: 'TodoCtrl',
			templateUrl: '/themes/todomvc/js/templates/todo.html'
		}).otherwise({
			redirectTo: '/'
		});
	});