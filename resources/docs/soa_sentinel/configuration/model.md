# Model Configuration

<!-- MarkdownTOC -->

- [Provide Model](#provide-model)
- [Set Title](#set-title)
- [Set Alias](#set-alias)
- [Set Display](#set-display)
- [Set custom permissions](#set-custom-permissions)
- [Set Create and Edit Forms](#set-create-and-edit-forms)
- [Disable Creation](#disable-creation)
- [Disable Edit](#disable-edit)
- [Disable Delete](#disable-delete)
- [Disable Restore](#disable-restore)
- [Example](#example)

<!-- /MarkdownTOC -->


SleepingOwl Admin model configurations must be stored within `bootstrapDirectory` (default: app/admin).

You can store all your model configurations in one file or split it as you want.

Here is example how your model configuration might look like:

	Admin::model('App\Contact2')->title('Contact')->alias('contacts2')->display(function ()
	{
	    $display = AdminDisplay::table();
	    $display->with('country', 'companies');
	    $display->filters([
	        Filter::related('country_id')->model('App\Country'),
	    ]);
	    $display->columns([
	        Column::image('photo')->label('Photo'),
	        Column::string('fullName')->label('Name'),
	        Column::datetime('birthday')->label('Birthday')->format('d.m.Y'),
	        Column::string('country.title')->label('Country')->append(Column::filter('country_id')),
	        Column::lists('companies.title')->label('Companies'),
	    ]);
	    return $display;
	})->create(function ()
	{
	    $form = AdminForm::form();
	    $form->items([
	        FormItem::columns()->columns([
	            [
	                FormItem::text('firstName', 'First Name')->required(),
	                FormItem::text('lastName', 'Last Name')->required(),
	                FormItem::text('phone', 'Phone'),
	                FormItem::text('address', 'Address'),
	            ],
	            [
	                FormItem::image('photo', 'Photo'),
	                FormItem::date('birthday', 'Birthday')->format('d.m.Y'),
	            ],
	            [
	                FormItem::select('country_id', 'Country')->model('App\Country')->display('title'),
	                FormItem::textarea('comment', 'Comment'),
	            ],
	        ]),
	    ]);
	    return $form;
	})->edit(function ($id)
	{
	    $form = AdminForm::form();
	    $form->items([
	        FormItem::columns()->columns([
	            [
	                FormItem::text('firstName', 'First Name')->required(),
	                FormItem::text('lastName', 'Last Name')->required(),
	                FormItem::text('phone', 'Phone'),
	                FormItem::text('address', 'Address'),
	            ],
	            [
	                FormItem::image('photo', 'Photo'),
	                FormItem::date('birthday', 'Birthday')->format('d.m.Y'),
	            ],
	            [
	                FormItem::select('country_id', 'Country')->model('App\Country')->display('title'),
	                FormItem::textarea('comment', 'Comment'),
	            ],
	        ]),
	    ]);
	    return $form;
	})->delete(function ($id)
	{
		return true;
	});

<a name="provide-model"></a>
## Provide Model

For PHP5.5+ you can use the following command:

	Admin::model(\App\MyModel::class)

If you are running PHP under 5.5 you can use the following command:

	Admin::model('App\MyModel')

<a name="set-title"></a>
## Set Title

	Admin::model(\App\MyModel::class)->title('My Model Title')

<a name="set-alias"></a>
## Set Alias

	Admin::model(\App\MyModel::class)->alias('districts')			

If no alias is defined, it will use the Model name as alias.

<a name="set-display"></a>
## Set Display

The display function will be use to configure the Overview Page for your model.

	Admin::model(\App\MyModel::class)->display(function ()
	{
	    // specify model display here
	})

<a name="set-custom-permissions"></a>
## Set custom permissions

With the implementation of Cartalyst Sentinel, you're now able to define custom
permissions for each model.

	Admin::model(\App\MyModel::class)->permission('permission1')

Multiple Permissions can be added with a comma as separator	

	Admin::model(\App\MyModel::class)->permission('permission1,permission2,permission3')
	
<a name="set-create-and-edit-forms"></a>
## Set Create and Edit Forms

You can provide one form for creation and edition.	

	Admin::model(\App\MyModel::class)->createAndEdit(function ()
	{
	    // specify model create or edit form here
	})

Or use separate forms.	

	Admin::model(\App\MyModel::class)->create(function ()
	{
	    // create form
	})
	->edit(function ($id)
	{
	    // edit form
	})

<a name="disable-creation"></a>
## Disable Creation

	Admin::model(\App\MyModel::class)->create(null))	

<a name="disable-edit"></a>
## Disable Edit

	Admin::model(\App\MyModel::class)->edit(null)	

<a name="disable-delete"></a>
## Disable Delete

You can disable delete function:	

	Admin::model(\App\MyModel::class)->delete(null)

<a name="disable-restore"></a>
## Disable Restore

You can disable restore function (in models with soft deletes):	

	Admin::model(\App\MyModel::class)->restore(null)

<a name="example"></a>
## Example

In this example we will explain how to disable an action based on a condition.

In our example we have two users with the following permissions

- News Writer
	- admin.news.write 	= true
	- admin.news.edit 	= false
	- admin.news.delete = false 
- News Manager	
	- admin.news.write 	= true
	- admin.news.edit 	= true
	- admin.news.delete = true 

As you can see, the user `News Writer` can only create new news articles.
The `News Manager` can edit/delete all records.

Our Admin will now looks like: 

	<?php

	Admin::model('App\Entities\News')->title('News')->alias('news')->display(function ()
	{
		$display = AdminDisplay::table();
		$display->columns([
			Column::string('id')->label('#'),
			Column::string('title')->label('Title'),
			Column::datetime('date')->label('Date')->format('d.m.Y'),
			Column::custom()->label('Published')->callback(function ($instance)
			{
				return $instance->published ? '&check;' : '-';
			}),
		]);
		return $display;
	})->createAndEdit(function ($id)
	{
		if ( !is_null($id) && !\Sentinel::hasAccess('admin.news.edit'))
		{
			return null;
		}
		$form = AdminForm::form();
		$form->items([
			FormItem::text('title', 'Title')->required(),
			FormItem::date('date', 'Date')->required()->format('d.m.Y'),
			FormItem::checkbox('published', 'Published'),
			FormItem::ckeditor('text', 'Text'),
		]);
		return $form;
	})->delete(function ($id)
	{
		if (!\Sentinel::hasAccess('admin.news.delete'))
		{
			return null;
		}
		return true;
	});	