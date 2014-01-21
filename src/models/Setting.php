<?php

class Setting {

	var $settings = array();

	public function __construct(){

		$path = storage_path().'/settings.json';

		if(file_exists($path)){
			$this->settings = json_decode(File::get($path), true);
		}		
	}

	public function apply($key, $items){

		//dd($key); 
		//dd($data);
		//dd($this->settings);

		//$data = array();

		/*
		// Save other items

		foreach($this->settings as $setting_key => $setting_data){
			//dd($setting_key);
			if($setting_key != $key){
				$data[$setting_key] = $setting_data;
			}
		}
		//dd($data);
		*/

		// Save for the current item

		//$data[$key] = array();
		//dd($items);

		foreach($items as $idx => $item){

			/*
			//dd($item['name']);
			if(!isset($item['name'])){
				//dd($item);
			}else{
				*/
			$item_name = $item['name'];
			//}
			
			//dd($this->settings->$key->$item_name);

			if(isset($this->settings[$key][$item_name])){

				//$data[$item_name] = $this->settings[$key][$item_name];
				$value = $this->settings[$key][$item_name];
			}else{

				/*
				$data[$item_name] = array(
					'status' 	=> '0',
					'color' 	=> '0'
				);
				*/
				$value = array(
					'status' 	=> '0',
					'color' 	=> '0'
				);
			}

			$items[$idx] = array_merge($items[$idx], $value);
		}
		//dd($data);
		//return $data;
		//dd($items);
		return $items;
	}

	/*
	public function getSettings(){

		return $this->settings;
	}
	*/

	public function save($data){

		File::put(storage_path().'/settings.json', json_encode($data));
	}
}