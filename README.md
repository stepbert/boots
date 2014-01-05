boots
=====

Laravel 4 package allowing to rapidly create modules/plugins and encapsulate them in separate files.

# What can we do with it?

- Create an HTML snippet.
- Test a javascript plugin.
- Create a demo page for a module/plugin.

# Requirements

- Composer
- Laravel 4
- Bower
- Twitter Bootstrap (not required)

# Installation

- Install this package. In composer.json (of the root of your project) add the package:

		{
			...
			"require": { 
				...
				"CloudRaker/boots": "dev-master"
			},
			"repositories": [{
				"type": "git",
				"url": "git@github.com:CloudRaker/boots.git"		
			}],
			...
		}

	$ composer update CloudRaker/boots

	In app/config/app.php

		'providers' => array(
			...
			'Cloudraker\Boots\BootsServiceProvider',
		)

	$ composer dump-autoload
	
- Install Twitter Bootstrap in public/components/

		$ bower install bootstrap#3.0.3 -S

- Publish package assets and configuration files

		$ php artisan asset:publish cloudraker/boots
		$ php artisan config:publish cloudraker/boots

# Getting started

- If necessary, edit the boots config file (app/config/packages/cloudraker/boots/boots.php).

- Create basic directories

		app/views/boots/
		
		public/css/boots/
		public/js/boots/

		Note: The "css/boots" and "js/boots" could have been anywhere (see the config file).

- Create your first component

		app/views/boots/myComponent.blade.php
		public/js/boots/myComponent.js
		public/css/boots/myComponent.less

- Import .less file

	In your main LESS file:

		...

- Visit da boooots: /boots

# Customization

### Component controls

	If you want to have button controls or some functionnality that is not included in your component you need to create the files:

		app/views/boots/controls/myComponent.blade.php
		public/js/boots/myComponent-controls.js

### Component page overwrite

	By default the View used to render a component is:

		vendor/cloudraker/boots/src/views/page.blade.php

	If you want to overwrite the component page to customize it just create the files:

		app/views/boots/pages/myComponent.blade.php
		public/js/boots/myComponent-page.js

# Exemples

### I'm creating a webpage and want to create the footer (module)

	- Create the file app/views/boots/footer.blade.php
	- Insert your HTML content

		<ul><li>footer></li></ul>
	- Create public/css/boots/footer.less file and import it in your main LESS file

### I'm creating a plugin and want to test it outside my website

	- Create blade files
	
		page
		...

### I need a javascript tool that will not be in the website but will be usefull

	- Create the blade file in your views
	- Create the js file

### I'm not using Laravel for my project, but I still want to use Boots

	- Install Laravel and Boots at the root of your project:

		www/*Drupal files*
		www/laravel/*Laravel files*

	- Put your asset and component files outside of Laravel:
		
		www/sites/all/themes/MyDrupalTheme/js/boots/*files*
		www/sites/all/themes/MyDrupalTheme/css/boots/*files*

	- In the config file of Boots change the Path to assets:

		'path_assets' => '../../sites/all/themes/MyDrupalTheme/'
