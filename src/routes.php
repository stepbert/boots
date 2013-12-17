<?php

function detect_component($filename){

	$base_path = base_path();
	$name = str_replace('.blade.php', '', $filename);

    return array(
    	'name' 		=> $name,
    	'type' 		=> '',
    	'controls' 	=> array(
    		'js' 	=> file_exists("{$base_path}/public/js/boots/{$name}-controls.js"),
    		'php' 	=> file_exists("{$base_path}/app/views/boots/controls/{$name}.blade.php")
    	),
    	'page' 		=> array(
    		'js' 	=> file_exists("{$base_path}/public/js/boots/{$name}-page.js"),
    		'php' 	=> file_exists("{$base_path}/app/views/boots/pages/{$name}.blade.php")
    	),
    	'view' 		=> "boots.{$name}",		            	
    	'js' 		=> file_exists("{$base_path}/public/js/boots/{$name}.js")
    );
}

//todo Authentification
//'before' => 'authentification'
Route::group(array('before' => 'lazyauth', 'prefix' => 'boots'), function(){

	Route::get('/', function(){

		//List components

		$components = array();
		//$base_path = base_path();

		if ($handle = opendir(base_path().'/app/views/boots/')) {

			$invalid_files = array('.', '..', '.DS_Store', '._.DS_Store', 'controls', 'pages');
		    
		    while (false !== ($entry = readdir($handle))) {

		        //if ($entry != "." && $entry != "..") {
		    	if(!in_array($entry, $invalid_files)){
		            //echo "$entry\n";

		        	$name = str_replace('.blade.php', '', $entry);

		            $components[] = detect_component($entry);
		        }
		    }
		    closedir($handle);
		}
		
		return View::make('boots::index', compact('components'));
	});

	Route::get('{item}', function($item){

		$filename = "{$item}.blade.php";

		// Verify if this component exist
		if(!file_exists(base_path()."/app/views/boots/{$filename}")){

			App::abort(404);

		}else{

			$component = detect_component($filename);

			// View overwriten?

			if(file_exists(base_path()."/app/views/boots/pages/{$filename}")){

				return View::make("boots.pages.{$item}", compact('component'));			
			
			}else{

				return View::make('boots::page', compact('component'));			
			}			
		}
	});

	//todo /test

});