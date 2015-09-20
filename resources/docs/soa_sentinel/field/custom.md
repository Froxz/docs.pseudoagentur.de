# Custom

Creates custom form item. You must specify display method (display()) and save method (callback()).

	FormItem::custom()->display(function ($instance)
	{
	    return view('my-form-item', ['instance' => $instance]);
	})->callback(function ($instance)
	{
	    $instance->myField = 12;
	})