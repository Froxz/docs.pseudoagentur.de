# Routes Configuration

You can register your own routes in `routes.php` file within `bootstrapDirectory` (default is `app/admin/routes.php`).

	Route::get('my-url', function ()
	{
	    $content = 'my page content';
	    return Admin::view($content, 'My Page Title');
	});

	Route::post('category/my-url', '\App\Http\Controllers\MyController@postMyUrl');
	Route::any('my-page', [
	    'as' => 'admin.my-page',
	    'uses' => '\App\Http\Controllers\MyPageController@myPage',
	]);

All routes will be registered with admin prefix and filter.

**Important:** If you want to render page content within admin interface use `Admin::view($content, $title)` method.	