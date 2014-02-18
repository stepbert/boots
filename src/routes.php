<?php

function detect_component($filename){

	$base_path = base_path();
	$path_to_assets = Config::get('boots::boots.path_assets');
	//dd($path_to_assets);
	$name = str_replace('.blade.php', '', $filename);

    return array(
    	'name' 		=> $name,
    	//'type' 		=> '',
    	/*
    	'controls' 	=> array(
    		'js' 	=> file_exists("{$base_path}/public/{$path_to_assets}js/boots/{$name}-controls.js"),
    		'php' 	=> file_exists("{$base_path}/app/views/boots/controls/{$name}.blade.php")
    	),
    	*/
    	'page' 		=> array(
    		'js' 	=> file_exists("{$base_path}/public/{$path_to_assets}js/boots/{$name}-page.js"),
    		'php' 	=> file_exists("{$base_path}/app/views/boots/pages/{$name}.blade.php")
    	),
    	'view' 		=> "boots.{$name}",		            	
    	'js' 		=> file_exists("{$base_path}/public/{$path_to_assets}js/boots/{$name}.js")
    );
}

// Allow to sort designs and components
function sort_by_name($a, $b){

	if($a['name'] == $b['name']){
		return 0;
	}
	return ($a['name'] < $b['name']) ? -1 : 1;
}

function load_components(){

	//List components

	$components = array();
	//$base_path = base_path();

	if($handle = opendir(base_path().'/app/views/boots/')){

		$invalid_files = array('.', '..', '.DS_Store', '._.DS_Store', 'controls', 'pages');
	    
	    while(false !== ($entry = readdir($handle))){

	    	if(!in_array($entry, $invalid_files)){
	            //echo "$entry\n";

	        	$name = str_replace('.blade.php', '', $entry);

	            $components[] = detect_component($entry);
	        }
	    }
	    closedir($handle);
	}

	//dd($components);

	$settings = new Setting();

	$components = $settings->apply('components', $components);

	usort($components, 'sort_by_name');

	return $components;
}

function load_designs(){

	$designs = array();

	if($handle = opendir(base_path().'/public/'.Config::get('boots::boots.path_designs'))){

		$invalid_files = array('.', '..', '.DS_Store', '._.DS_Store');
	    
	    while(false !== ($entry = readdir($handle))){

	    	//dd(strpos($entry, '._'));

	    	if(!in_array($entry, $invalid_files) && strpos($entry, '._') !== 0){
	            //echo "$entry\n";

	        	$name = str_replace('.jpg', '', strtolower($entry));

	            $designs[] = array('name' => $name);
	        }
	    }
	    closedir($handle);
	}

	$settings = new Setting();

	$designs = $settings->apply('designs', $designs);

	usort($designs, 'sort_by_name');
	//dd($designs);

	return $designs;
}

//todo Authentification
//'before' => 'authentification'
Route::group(array('before' => 'lazyauth', 'prefix' => 'boots'), function(){

	Route::get('/', function(){

		$components = load_components();
		$components2 = $components;

		// Components into groups

		$groups = array();

		foreach(Config::get('boots::boots.order') as $groupname => $item){

			$groups[$groupname] = array();

			foreach($item as $componentname){

				foreach($components2 as $key => $c){

					if($c['name'] == $componentname){

						$groups[$groupname][] = $c;
						unset($components2[$key]);

						break;
					}

					//dd($c);
				}
			}

			//dd($item);
		}

		// Components not in the config file

		foreach($components2 as $c){
			$groups[''][] = $c;
		}

		$designs = load_designs();
		
		return View::make('boots::index', compact('components', 'groups', 'designs'));
	});

	Route::get('designs', function(){

		$components = load_components();
		$designs 	= load_designs();

		return View::make('boots::designs', compact('designs', 'components'));
	});

	Route::get('designs/{item}', function($item){

		//$designs = load_designs();
		$filename = "{$item}.jpg";

		if(!file_exists(base_path()."/public/".Config::get('boots::boots.path_designs')."/{$filename}")){
			
			App::abort(404);

		}else{
				
			return View::make('boots::design-item')->with('design', $item);
		}
	});

	Route::controller('admin', 'AdminController');

	/*
	Route::get('admin', function(){

		$components = load_components();
		$designs 	= load_designs();

		return View::make('boots::admin', compact('components', 'designs'));
	});
	*/

	Route::get('{item}', function($item){

		$filename = "{$item}.blade.php";

		// Verify if this component exist
		if(!file_exists(base_path()."/app/views/boots/{$filename}")){
			
			App::abort(404);

		}else{
			
			$component = detect_component($filename);
			//dd($component);

			// View overwriten?

			//if(file_exists(base_path()."/app/views/boots/pages/{$filename}")){
			if($component['page']['php']){

				return View::make("boots.pages.{$item}", compact('component'));
			
			}else{

				return View::make('boots::page', compact('component'));			
			}			
		}
	});

	//todo /test
	
});