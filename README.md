boots
=====

Laravel 4 package allowing to rapidly create modules/plugins and encapsulate them in separate files.

# What can we do with it?

- Create an HTML snippet.
- Test a javascript plugin.
- Create a demo page for a module/plugin.

# Requirements

-Laravel 4
-Bower

# Installation

-Install Twitter Bootstrap
-Publish package assets

-Create basic directories

	app/views/bootstrap/
	
	public/css/bootstrap/
	public/js/bootstrap/

-Create your components

	app/views/bootstrap/myComponent.blade.php
	public/js/bootstrap/myComponent.js
	public/css/bootstrap/myComponent.less

-Import .less file

	In your main LESS file:

		...

# Customization

### Component controls

	If you want to have button controls or some functionnality that is not included in your component you need to create the files:

		app/views/bootstrap/controls/myComponent.blade.php
		public/js/bootstrap/myComponent-controls.js

### Component page overwrite

	By default the View used to render a component is:

		vendor/cloudraker/bootstrap/src/views/page.blade.php

	If you want to overwrite the component page to customize it just create the files:

		app/views/bootstrap/pages/myComponent.blade.php
		public/js/bootstrap/myComponent-page.js

# Exemples

### I'm creating a webpage and want to create the footer (module)

	- Create the file app/views/bootstrap/footer.blade.php
	- Insert your HTML content

		<ul><li>footer></li></ul>
	- Create public/css/bootstrap/footer.less file and import it in your main LESS file

### I'm creating a plugin and want to test it outside my website

	- Create blade files
	
		page
		...

### I need a javascript tool that will not be in the website but will be usefull

	- Create the blade file in your views
	- Create the js file
