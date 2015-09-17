# Menu Configuration

<!-- MarkdownTOC -->

- [Create Menu Item for Model](#create-menu-item-for-model)
- [Create Menu Item with Custom Url](#create-menu-item-with-custom-url)
- [Set Label](#set-label)
- [Set Icon](#set-icon)
- [Nested Menus](#nested-menus)

<!-- /MarkdownTOC -->


SleepingOwl Admin menu configuration default placement is in app/admin/menu.php.

Here is simple example how your menu configuration might look like:

	Admin::menu()->url('/')->label('Start Page')->icon('fa-dashboard');
	Admin::menu('App\User')->icon('fa-user');
	Admin::menu()->label('Subitems')->icon('fa-book')->items(function ()
	{
	    Admin::menu(\Acme\Models\Bar\User::class)->icon('fa-user');
	    Admin::menu(\Acme\Models\Foo::class)->label('my label');
	    Admin::menu()->url('about')->label('About');
	});

<a name="create-menu-item-for-model"></a>
## Create Menu Item for Model

For PHP5.5+ you can use the following command:

	Admin::menu(\App\MyModel::class)

If you are running PHP under 5.5 you can use the following command:

	Admin::menu('App\MyModel')	


Model must be registered in SleepingOwl Admin. For details see [model configuration](/{{version}}/configuration_model).

Label for this menu item will be model title, but you can provide custom label using `label()` method.

Url for this item will be generated automatically and will be a link to the model.	

<a name="create-menu-item-with-custom-url"></a>
## Create Menu Item with Custom Url

	Admin::menu()->url('my-url')->label('My Label')

Url must be registered in admin routes. For details see [routes configuration](/{{version}}/configuration_routes).

<a name="set-label"></a>
## Set Label

	Admin::menu()->url('my-url')->label('My Label')

<a name="set-icon"></a>
## Set Icon

	Admin::menu()->url('my-url')->label('My Label')->icon('fa-bank')

You can use <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome 4.1.0</a> icon classes.

<a name="nested-menus"></a>
## Nested Menus

	Admin::menu()->label('Subitems')->icon('fa-book')->items(function ()
	{
	    Admin::menu(\Acme\Models\Bar\User::class)->icon('fa-user');
	    Admin::menu(\Acme\Models\Foo::class)->label('my label');
	    Admin::menu()->url('about')->label('About');
	});

You can create unlimited submenus. There is no depth limit.	