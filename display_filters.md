# Filters

- Filter Overview
- Filter by related model
- Filter by field
- Filter with scope
- Custom filter

## Filter Overview

### Alias

All filters have `alias`. If query has parameter with alias name - filter will be applyed.

You can set alias by using `alias($alias)` method. If there is no alias filter name will be used as alias.

###Title

Filter title will be displayed as page subtitle if it is active. Some filters generate title by itself.

You can set override title by using `title($title)` method. If `$title` is string it will be used as is, if it is closure - it will be called with parameter value:

	Filter::field('my_field')->title(function ($value)
	{
	    return 'Parameter Value: ' . $value;
	})

### Override Query Parameter
	
	Filter::field('title')->value('TODO category')

Creates filter by `title` field. It ignores query parameter value and overrides it with `'TODO category'`.

**Important:** query parameter must have value. You can\`t access this filter using `categories?title`, but `categories?title=1` or `categories?title=something_else` will work.


## Filter by Related Model

You must provide field to be filtered by (`related_id` in the example), related model class (`App\Related`) and related model field to be displayed as filter title (`firstName`). Filter value will be extracted from query parameters.

	Filter::related('related_id')->model('App\Related')->display('firstName')

## Filter by Field
 
You can create filter by field. This code will filter your models by parameter from query.

	Filter::field('published')

## Filter with Scope

This filter will apply scope to your query.

	Filter::scope('myScope')

You must add scope to your model (for details see <a href="http://laravel.com/docs/5.0/eloquent#query-scopes" target="_blank">laravel scope docs</a>):

	public function scopeMyScope($query, $parameter)
	{
	    $query->where('myField', $parameter);
	}

## Custom Filter

You can create your own filters (`$query` will be eloquent query builder, `$parameter` - query parameter value):

	Filter::custom('filter_name')->callback(function ($query, $parameter)
	{
	    $query->where('myField', $parameter);
	})->title('My Filter Title')	