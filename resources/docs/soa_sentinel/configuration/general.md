# General Configuration

The Config file `config/admin.php` has the following structure (removed the comments to keep it as short as possible):

	<?php

	return [

		'title'                   => 'SOA Backend',
		'title-mini'              => 'SOA',

		'prefix'                  => 'admin',

		'middleware'              => ['admin.auth'],

		'bootstrapDirectory'      => app_path('Admin'),

		'imagesUploadDirectory' => 'images/uploads',

		'filemanagerDirectory' =>  'files/',

		'auth'                    => [
			'model' => '\SleepingOwl\AdminAuth\Entities\Administrator',
			'rules' => [
				'email' => 'required',
				'password' => 'required',
			]
		],

		'template'                => 'SleepingOwl\Admin\Templates\TemplateDefault',

		'datetimeFormat'          => 'd.m.Y H:i',
		'dateFormat'              => 'd.m.Y',
		'timeFormat'              => 'H:i',

		'ckeditor' => [
			'filebrowserBrowseUrl' 		=> [
				"type" 	=> "url",
				"path"	=> "elfinder/ckeditor" 
			],
			'filebrowserImageBrowseUrl' => [
				"type" 	=> "url",
				"path"	=> "elfinder/ckeditor" 
			]
		],
	];


Here you will find a explaination for each attribute:

| Attribute        							| Description													 							|
| ----------------------------------------- | ----------------------------------------------------------------------------------------- |
| title      								| Title for your Backend  																	|
| title-mini       							| Short name which will be used if you're activate the 'sidebar_mini' in the [AdminLTE Theme Configuration](/{{version}}/configuration/adminlte) |
| prefix  									| Defines the url prefix   																	|
| middleware  								| Defines the middleware for the backend 													|
| bootstrapDirectory  						| Defines the path to the directory where the admin model definition will be stored  		|
| imagesUploadDirectory  					| Deprecated. Please use `filemanagerDirectory` instead.  									|
| filemanagerDirectory  					| Defines the upload path for the `image` and `images` field.   							|
| auth.model  								| Deprecated since we're using Cartalyst Sentinel  											|
| auth.rules.email   						| Defines the validation rule for the email login field 									|
| auth.rules.password  						| Defines the validation rule for the email login field 									|
| template  								| Default Template for the Backend  														|
| datetimeFormat  							| Default Format for the Date/Time Field  													|
| dateFormat  								| Default Format for the Date Field  														|
| timeFormat   								| Default Format for the Time Field  														|
| ckeditor.filebrowserBrowserUrl.type  		| Function which will be used to parse the path.  											|
| ckeditor.filebrowserBrowserUrl.path  		| Defines the url / route to the elfinder   												|
| ckeditor.filebrowserImageBrowseUrl.type  	| Function which will be used to parse the path.  											|
| ckeditor.filebrowserImageBrowseUrl.type  	| Defines the url / route to the elfinder   												|