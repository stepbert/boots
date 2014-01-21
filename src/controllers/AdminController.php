<?php
//namespace Cloudraker\Boots;

class AdminController extends BaseController {
	
	public function getIndex(){

		//$settings = new Setting();

		$components = load_components();
		$designs 	= load_designs();
		
		return View::make('boots::admin', compact('components', 'designs'));
	}

	public function postIndex(){
		
		//dd(Input::all());

		// Load settings

		//$settings = new Setting();
		//$settings = $settings->getSettings();
		//$data = File::get(storage_path().'/settings.json');
		//dd($data);

		// HTML
		
		$status = Input::get('status');
		$color = Input::get('color');

		// Designs

		$design_names = Input::get('designs');
		$designs = array();

		foreach($design_names as $name){

			$designs[$name] = array(
				'status' 	=> $status[$name],
				'color' 	=> $color[$name]
			);
		}

		// Components

		$components_names = Input::get('components');
		$components = array();

		foreach($components_names as $name){

			$components[$name] = array(
				'status' 	=> $status[$name],
				'color' 	=> $color[$name]
			);
		}
		
		$data = array(
			'designs' => $designs,
			'components' => $components
		);		

		//dd(storage_path().'/settings.json');

		//File::put(storage_path().'/settings.json', json_encode($data));
		$settings = new Setting();
		$settings->save($data);

		$components = load_components();
		$designs 	= load_designs();
		$message = 'Settings saved.';

		return View::make('boots::admin', compact('components', 'designs', 'message'));
	}
}