<?php

return array(

	// Title on the header

	'title' => 'CloudRaker Boots',

	// Group and order the components
	// If a component is not set in this list, it will be added to the end of all components.

	'order' => array(
		'UI' 			=> array(),
		'Menus'		 	=> array(),		
		'Pages' 		=> array(),
	),

	// Root path to assets (js and css directories)
	// It allows to use Boots asset files outside of Laravel.
	// If empty, by default it will link to "public/".	
	
	'path_assets'	=> '',

	// Path to main CSS file.
	// It allows to link to a CSS file outside of Laravel.

	'file_css' 		=> 'css/index.css',

	'path_designs' 	=> 'img/boots/designs/',

	//...

	// Change if you need anything more...
	// But if changed after data have been saved, the data could be corrupted.
	'tags_status' => array(
		0 => 'undefined',
		1 => 'hold',
		2 => 'approved',
		3 => 'completed'
	),

	// Not supposed to change.
	'tags_colors' => array(
		0 => 'default',
		1 => 'primary',
		2 => 'success',
		3 => 'info',
		4 => 'warning',
		5 => 'danger'
	)
);