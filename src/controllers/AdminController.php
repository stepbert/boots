<?php
//namespace Cloudraker\Boots;

class AdminController extends BaseController {
	
	public function getIndex(){

		$components = load_components();
		$designs 	= load_designs();

		$settings = new Setting();
		$settings->apply('design', $designs);
		//$data = json_decode(File::get(storage_path().'/settings.json'));

		dd($data);

		return View::make('boots::admin', compact('components', 'designs'));
	}

	public function postIndex(){
		
		//dd(Input::all());

		// Load settings

		$data = File::get(storage_path().'/settings.json');
		dd($data);

		// HTML
		
		$status = Input::get('status');
		$colors = Input::get('colors');

		// Designs

		$design_names = Input::get('designs');
		$designs = array();

		foreach($design_names as $name){

			$designs[$name] = array(
				'status' 	=> $status[$name],
				'color' 	=> $colors[$name]
			);
		}

		// Components

		$components_names = Input::get('components');
		$components = array();

		foreach($components_names as $name){

			$components[$name] = array(
				'status' 	=> $status[$name],
				'color' 	=> $colors[$name]
			);
		}
		
		$data = array(
			'designs' => $designs,
			'components' => $components
		);		

		//dd(storage_path().'/settings.json');

		File::put(storage_path().'/settings.json', json_encode($data));

		$components = load_components();
		$designs 	= load_designs();
		$message = 'Settings saved.';

		return View::make('boots::admin', compact('components', 'designs', 'message'));
	}
}