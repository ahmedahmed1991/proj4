<?php

class BaseController extends Controller {

	/**
	*
	*/
	public function __construct() {

		# Any submissions via POST need to pass the CSRF filter
		$this->afterFilter('csrf', array('on' => 'post'));

	}

}
