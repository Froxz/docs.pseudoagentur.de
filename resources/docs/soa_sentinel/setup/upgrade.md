# Upgrade

- [to 3.0.1](#3_0_1)
- [to 3.0.2](#3_0_2)
- [to 3.0.3](#3_0_3)

<a name="3_0_1"></a>
## Upgrade from 3.0.0 to 3.0.1

### What's new in 3.0.1

* AdminLTE Theme has been updated incl. all Plugins e.g. ckEditor, datatables etc.
* Select field has been updated
* Added new options for File/Image Upload field
* New Field which allows the user to use tinyMCE instead of ckEditor
* Ajax Validation
* Each field can have now a help text
* Datatables export functionality is now available and configurable
* Implementation of elFinder for the WYSIWYG Editor
* Bugfixes


### File Updates

#### Resources
We have updated many views and assets.
Please run the following commands to update them. 

	php artisan vendor:publish --force --tag="assets"

The first command will update all assets.

If you have changed something in the admin views or assets, please check them.
Otherwise use the package views and merge them with your modifications.

If you're running soa-sentinel without changing anything, you can also run

	php artisan vendor:publish --force

But this will overwrite also the config files. Please backup your changes!!!!	

To get the latest resources from the elFinder package (or to initialize it after `composer update`) you have to run the following commands:

	php artisan elfinder:publish
	php artisan vendor:publish --provider="Barryvdh\Elfinder\ElfinderServiceProvider"

#### config/app.php 

Please ensure that 

- the `providers` array includes this providers:

    'Cartalyst\Sentinel\Laravel\SentinelServiceProvider',
    'SleepingOwl\Admin\AdminServiceProvider',
    'Barryvdh\Elfinder\ElfinderServiceProvider',
    'Proengsoft\JsValidation\JsValidationServiceProvider',

- the 'aliases' array includes this aliases:

    'Activation'    => 'Cartalyst\Sentinel\Laravel\Facades\Activation',
    'Reminder'      => 'Cartalyst\Sentinel\Laravel\Facades\Reminder',
    'Sentinel'      => 'Cartalyst\Sentinel\Laravel\Facades\Sentinel',

    'Admin'         => 'SleepingOwl\Admin\Admin',
    'Column'        => 'SleepingOwl\Admin\Columns\Column',
    'ColumnFilter'  => 'SleepingOwl\Admin\ColumnFilters\ColumnFilter',
    'Filter'        => 'SleepingOwl\Admin\Filter\Filter',
    'AdminDisplay'  => 'SleepingOwl\Admin\Display\AdminDisplay',
    'AdminForm'     => 'SleepingOwl\Admin\Form\AdminForm',
    'AdminTemplate' => 'SleepingOwl\Admin\Templates\Facade\AdminTemplate',
    'FormItem'      => 'SleepingOwl\Admin\FormItems\FormItem',

    'JsValidator'   => 'Proengsoft\JsValidation\Facades\JsValidatorFacade',


#### config/admin.php

Here we have a new parameter `filemanagerDirectory`.

	/*
	 * Directory for file manager  (relative to public directory)
	 */
	'filemanagerDirectory' =>  'files/',

Please add them, if not available.

Also we have updated the `ckeditor` parameter.

Please ensure that the parameter looks like:


	/*
	 * If you want, you can extend ckeditor default configuration
	 * with this PHP Hash variable.
	 *
	 * Checkout http://docs.ckeditor.com/#!/api/CKEDITOR.config for more information.
	 */
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


#### config/admintheme.php 

This is a new config file, which allows you to change the skin and layout options for AdminLTE.	