<!doctype html>
<html lang="en" data-framework="angularjs">
	<head>
		<meta charset="utf-8">
		<% base_tag %>
		<title>AngularJS • TodoMVC</title>
		<link rel="stylesheet" href="$ThemeDir/bower_components/todomvc-common/base.css">
		<style>[ng-cloak] { display: none; }</style>
	</head>
	<body ng-app="todomvc" class="$ClassName">
	
		$Form
	
		<ng-view />

		<script src="$ThemeDir/bower_components/todomvc-common/base.js"></script>
		<script src="$ThemeDir/bower_components/angular/angular.js"></script>
		<script src="$ThemeDir/bower_components/angular-route/angular-route.js"></script>
		<script src="$ThemeDir/js/app.js"></script>
		<script src="$ThemeDir/js/controllers/todoCtrl.js"></script>
		<script src="$ThemeDir/js/services/todoStorage.js"></script>
		<script src="$ThemeDir/js/directives/todoFocus.js"></script>
		<script src="$ThemeDir/js/directives/todoEscape.js"></script>
	</body>
</html>
