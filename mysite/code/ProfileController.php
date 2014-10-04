<?php

class ProfileController extends AppController {

	function Title(){
		return 'Profile';
	}

	function init(){
		//TODO here'd go some permission settings to check if the current member is logged in
		parent::init();
	}

}