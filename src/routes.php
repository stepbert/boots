<?php

function detect_component($filename){

	$base_path = base_path();
	$name = str_replace('.blade.php', '', $filename);

    return array(
    	'name' 		=> $name,
    	'type' 		=> '',
    	'controls' 	=> array(
    		'js' 	=> file_exists("{$base_path}/public/js/bootstrap/{$name}-controls.js"),
    		'php' 	=> file_exists("{$base_path}/app/views/bootstrap/controls/{$name}.blade.php")
    	),
    	'page' 		=> array(
    		'js' 	=> file_exists("{$base_path}/public/js/bootstrap/{$name}-page.js"),
    		'php' 	=> file_exists("{$base_path}/app/views/bootstrap/pages/{$name}.blade.php")
    	),
    	'view' 		=> "bootstrap.{$name}",		            	
    	'js' 		=> file_exists("{$base_path}/public/js/bootstrap/{$name}.js")
    );
}

//todo Authentification
//'before' => 'authentification'
Route::group(array('before' => 'lazyauth', 'prefix' => 'bootstrap'), function(){

	Route::get('/', function(){

		//dd(base_path().'/app/views/bootstrap/');

		//List components

		$components = array();
		//$base_path = base_path();

		if ($handle = opendir(base_path().'/app/views/bootstrap/')) {

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
		
		return View::make('bootstrap::index', compact('components'));
	});


	Route::get('{item}', function($item){

		$filename = "{$item}.blade.php";

		// Verify if this component exist
		if(!file_exists(base_path()."/app/views/bootstrap/{$filename}")){

			App::abort(404);

		}else{

			$component = detect_component($filename);

			// View overwriten?

			if(file_exists(base_path()."/app/views/bootstrap/pages/{$filename}")){

				return View::make("bootstrap.pages.{$item}", compact('component'));			
			
			}else{

				return View::make('bootstrap::page', compact('component'));			
			}			
		}
	});

	//todo /test

});