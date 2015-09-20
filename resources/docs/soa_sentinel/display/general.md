# Display Methods

<!-- MarkdownTOC -->

- [Set Columns](#set-columns)
- [Eager Loading](#eager-loading)
- [Modify Query](#modify-query)
- [Apply Scopes](#apply-scopes)
- [Set Filters](#set-filters)
- [Set Parameters](#set-parameters)
- [Bulk Actions](#bulk-actions)

<!-- /MarkdownTOC -->


<a name="set-columns"></a>
## Set Columns

Provide columns to show in table. For details see [columns](/{{version}}/display/columns).

	$display->columns([
	    Column::string('title')->label('Title'),
	    ...
	]);

<a name="eager-loading"></a>
## Eager Loading

Set relations to be eager loaded.

	$display->with('related', 'other_relation');

<a name="modify-query"></a>
## Modify Query

You can modify query as you want:

	$display->apply(function ($query)
	{
	    $query->where('my_field', 2);
	    $query->orderBy('date', 'desc');
	});

<a name="apply-scopes"></a>
## Apply Scopes

You can apply eloquent scopes to this display:

	$display->scope('myScope');

<a name="set-filters"></a>
## Set Filters

You can add filters to this display. Filters will be applied based on query parameters. For details see [filters](/{{version}}/display/filters).

	$display->filters([
	    Filter::scope('last')->title('Latest News'),
	    ...
	]);

<a name="set-parameters"></a>
## Set Parameters

This parameters will be added to create and edit urls and can be used as default values for form items.

	$display->parameters([
	    'related_id' => 12,
	    ...
	]);

<a name="bulk-actions"></a>
## Bulk Actions

You can add bulk actions:

	$display->actions([
	    Column::action('export')->value('Export')->icon('fa-share')->target('_blank')->callback(function ($collection)
	    {
	        dd('You are trying to export:', $collection->toArray());
	    }),
	    ...
	]);

To use bulk actions you must add `Column::checkbox()` to your columns.