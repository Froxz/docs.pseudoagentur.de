# AdminLTE THeme Configuration

The Config file `config/admintheme.php` has the following structure (removed the comments to keep it as short as possible):


	<?php 

	return [
		
		'skin'	=> 'blue',

		'fixed_layout'		=> true,

	 	'boxed_layout' 		=> false,

	 	'sidebar_mini'		=> true,

	  	'toggle_sidebar'	=> true,

	   	'sidebar_on_hover'	=> true   
	];


Here you will find a explaination for each attribute:

| Attribute        							| Description													 							|
| ----------------------------------------- | ----------------------------------------------------------------------------------------- |
| skin      								| Defines the skin for AdminLTE 															|
| fixed_layout       						| Activate the fixed layout. You can't use fixed and boxed layouts together 				|
| boxed_layout  							| Activate the boxed layout. You can't use fixed and boxed layouts together					|
| sidebar_mini  							| Enable mini sidebar 																		|
| toggle_sidebar  							| Toggle the left sidebar's state (open or collapse) 										|
| sidebar_on_hover  						| Let the sidebar mini expand on hover 					  									|


## Available Skins

We're supporting all currently existing skins for the AdminLTE Theme.

- blue / blue-light
- black / black-light
- purple / purple-light
- green / green-light
- red / red-light
- yellow / yellow-light