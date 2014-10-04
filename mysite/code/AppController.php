<?php

class AppController extends Controller {

	function init(){
		parent::init();

		//Requirements::css('mysite/css/app.css');
		//Requirements::javascript('mysite/javascript/app.js');

	}


	function Title(){
		return 'Main';
	}

	function ClassName(){
		return $this->class;
	}

	function SiteConfig(){
		$arr = array(
			'Title' => 'My App'
		);

		return new ArrayData($arr);
	}


}
