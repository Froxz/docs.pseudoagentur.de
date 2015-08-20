#Example

- [Dummy Module](#dummy-module)
- [Admin Model](#admin-model)
- [Menu](#admin-menu)
- [Done](#done)


<a name="dummy-module"></a>
## Dummy Module

In our example we have created a example module named "NewsExample" via the existing Modules Command.

(You can find the documentation for this at the <a href="http://sky.pingpong-labs.com/docs/2.0/modules#artisan-commands" target="_blank">Official documentation page</a>)

	php artisan module:make NewsExample

Then you have to create a Dummy Migration for our Module:

	php artisan module:make-migration create_news_table --fields="title:string, slug:string" NewsExample

Then you have to create a Dummy Model for our Module:

	php artisan module:model News NewsExample	

Then you have to run the module migration
	
	php artisan module:migrate

Now you have a folder structure something like this:

	modules
	└── NewsExample
	    ├── Assets
	    ├── Config
	    │   └── config.php
	    ├── Console
	    ├── Database
	    │   ├── Migrations
	    │   │   └── 2015_08_20_101321_create_news_table.php
	    │   └── Seeders
	    │       └── NewsExampleDatabaseSeeder.php
	    ├── Entities
	    │   └── News.php
	    ├── Http
	    │   ├── Controllers
	    │   │   └── NewsExampleController.php
	    │   ├── Middleware
	    │   ├── Requests
	    │   └── routes.php
	    ├── Providers
	    │   └── NewsExampleServiceProvider.php
	    ├── Repositories
	    ├── Resources
	    │   ├── lang
	    │   └── views
	    │       ├── index.blade.php
	    │       └── layouts
	    │           └── master.blade.php
	    ├── Tests
	    ├── composer.json
	    ├── module.json
	    └── start.php



<a name="admin-model"></a>
## Admin Model

At first you have to go to the root directory of your created module, in the example, it's  `modules/NewsExample`.
Now we can create a file named `admin.php`. 


The content is something like:

	\Admin::model('Modules\NewsExample\Entities\News')->title('News')->alias('news')->display(function ()
	{
	    $display = AdminDisplay::table();
	    $display->columns([
	        \Column::string('title')->label('Title'),
	        \Column::string('slug')->label('Slug'),
	        //add your own columns
	    ]);
	    return $display;
	})->createAndEdit(function ()
	{
	    $form = \AdminForm::form();
	    $form->items([
			\FormItem::text('title', 'News Title')->required(),
			\FormItem::text('slug', 'Slug')->required()->unique()
			//add your own fields
	    ]);
	    return $form;
	});

The Admin Bridge Package will now check each module against the `admin.php` file.
If this file exists, it will include it automatically.

<a name="admin-menu"></a>
## Menu

To manage your Admin Models in SOA, you have to create a menu entry for each Model.
In our case, we have only one model - So we need only one menu entry.

We did it with the following steps.

At first you have to go to the root directory of your created module, in the example, it's  `modules/NewsExample`.
Now we can create a file named `adminmenu.php`. 

Inside the `adminmenu.php` you have to add the following:

	\Admin::menu('Modules\NewsExample\Entities\News')->icon('fa-newspaper-o');

As next step, you have to open the `module.json`.
In this file to have to add the `adminmenu.php` into the `files` array.

The `module.json` will then looks like:

	{
	    "name": "NewsExample",
	    "alias": "newsexample",
	    "description": "",
	    "keywords": [],
	    "active": 1,
	    "order": 0,
	    "providers": [
	        "Modules\\NewsExample\\Providers\\NewsExampleServiceProvider"
	    ],
	    "aliases":{},
	    "files": [
	        "start.php",
	        "adminmenu.php"
	    ]
	}	

<a name="done"></a>
## Done

Now after saving all files and optional deploying to your remote server,
you should see a new menu entry named `News` in your SOA Sidebar.

Your folder structure should looks like:

	modules
	└── NewsExample
	    ├── Assets
	    ├── Config
	    │   └── config.php
	    ├── Console
	    ├── Database
	    │   ├── Migrations
	    │   │   └── 2015_08_20_101321_create_news_table.php
	    │   └── Seeders
	    │       └── NewsExampleDatabaseSeeder.php
	    ├── Entities
	    │   └── News.php
	    ├── Http
	    │   ├── Controllers
	    │   │   └── NewsExampleController.php
	    │   ├── Middleware
	    │   ├── Requests
	    │   └── routes.php
	    ├── Providers
	    │   └── NewsExampleServiceProvider.php
	    ├── Repositories
	    ├── Resources
	    │   ├── lang
	    │   └── views
	    │       ├── index.blade.php
	    │       └── layouts
	    │           └── master.blade.php
	    ├── Tests
	    ├── admin.php
	    ├── adminmenu.php
	    ├── composer.json
	    ├── module.json
	    └── start.php

