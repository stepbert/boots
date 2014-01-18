<?php
//namespace Cloudraker\Boots;
die("!");
class AdminController extends BaseController {
	
	public function getIndex(){

		$components = load_components();
		$designs 	= load_designs();

		return View::make('boots::admin', compact('components', 'designs'));
	}
}