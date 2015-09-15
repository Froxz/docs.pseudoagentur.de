# Model Configuration

SleepingOwl Admin model configurations must be stored within bootstrapDirectory (default: app/admin).

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
	})->createAndEdit(function ()
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
	})->delete(null);

## Provide Model

For PHP5.5+ you can use the following command:

	Admin::model(\App\MyModel::class)

If you are running PHP under 5.5 you can use the following command:

	Admin::model('App\MyModel')

## Set Title

	Admin::model(\App\MyModel::class)->title('My Model Title')

## Set Alias

	Admin::model(\App\MyModel::class)->alias('districts')			

If no alias is defined, it will use the Model name as alias.

## Set Display

The display function will be use to configure the Overview Page for your model.

	Admin::model(\App\MyModel::class)->display(function ()
	{
	    // specify model display here
	})

## Set custom permissions

With the implementation of Cartalyst Sentinel, you're now able to define custom
permissions for each model.

	Admin::model(\App\MyModel::class)->permission('permission1')

Multiple Permissions can be added with a comma as separator	

	Admin::model(\App\MyModel::class)->permission('permission1,permission2,permission3')
	

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
	->edit(function ()
	{
	    // edit form
	})

## Disable Creation

	Admin::model(\App\MyModel::class)->createAndEdit(function ($id)
	{
	    if (is_null($id))
	    {
	        return null;
	    }
	    ...
	})	

## Disable Edition

	Admin::model(\App\MyModel::class)->createAndEdit(function ($id)
	{
	    if ( ! is_null($id))
	    {
	        return null;
	    }
	    ...
	})	

## Disable Delete

You can disable delete function:	

	Admin::model(\App\MyModel::class)->delete(null)

## Disable Restore

You can disable restore function (in models with soft deletes):	

	Admin::model(\App\MyModel::class)->restore(null)