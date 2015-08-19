#Example

- [Dummy Module](#dummy-module)
- [Admin Model](#admin-model)
- [Menu](#admin-menu)


<a name="dummy-module"></a>
## Dummy Module

In our example we have created a example module named "NewsExample" via the existing Modules Command.

(You can find the documentation for this at the <a href="http://sky.pingpong-labs.com/docs/2.0/modules#artisan-commands" target="_blank">Official documentation page</a>)

	php artisan module:make NewsExample

Then we will create a Dummy Model for our Module:

	php artisan module:model News NewsExample	

Then we will crea	

Now we have a folder structure something like this:

	modules
	└── NewsExample
	    ├── Assets
	    ├── Config
	    ├── Console
	    ├── Database
	    │   ├── Migrations
	    │   └── Seeders
	    ├── Entities
	    │   └── News.php
	    ├── Http
	    │   ├── Controllers
	    │   ├── Filters
	    │   ├── Requests
	    │   └── routes.php
	    ├── Providers
	    ├── Repositories
	    ├── Resources
	    │   ├── lang
	    │   └── views
	    │       └── backend
	    ├── Tests
	    ├── composer.json
	    ├── menus.php
	    ├── module.json
	    └── start.php


<a name="admin-model"></a>
## Admin Model

At first you have to go to the root directory of your created module, in the example, it's  `modules/NewsExample`.
Now we can create a file named `admin.php`. 


The content is something like:

	\Admin::model('Modules\newsexample\Entities')->title('News')->alias('News')->display(function ()
	{
	    $display = AdminDisplay::table();
	    $display->columns([
	        \Column::string('title')->label('Title'),
	        \Column::datetime('created_at')->label('Created')
	    ]);
	    return $display;
	})->createAndEdit(function ()
	{
	    $form = \AdminForm::form();
	    $form->items([
			\FormItem::text('firstName', 'First Name')->required()
			//here you can add your own fields
	    ]);
	    return $form;
	});


<a name="admin-menu"></a>
## Menu
