<?php

class Setting {

	$settings = null;

	public function __construct(){

		$this->settings = json_decode(File::get(storage_path().'/settings.json'));
	}

	public function apply($key, $data){

		dd($key); 
		//dd($data);
	}
}