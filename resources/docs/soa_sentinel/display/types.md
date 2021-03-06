# Display Types

<!-- MarkdownTOC -->

- [Table](#table)
- [Datatables](#datatables)
- [Datatables async](#datatables-async)
- [Tree](#tree)
- [Tabbed](#tabbed)
- [Custom](#custom)

<!-- /MarkdownTOC -->


<a name="table"></a>
## Table

	…->display(function ()
	{
	    $display = AdminDisplay::table();
	    // configure display
	    return $display;
	})

<a name="datatables"></a>
## Datatables

This display extends `table` display and you can use all table features.

	…->display(function ()
	{
	    $display = AdminDisplay::datatables();
	    // configure display
	    return $display;
	})

<a name="datatables-set-order"></a>
### Set Order

You can specify default order for your table in datatables format (column index and order direction):
	
	$display->order([[0, 'desc']]);

You can use multiple order fields:

	$display->order([[0, 'desc'], [2, 'asc']]);

<a name="datatables-column-filters"></a>
### Column Filters

Provide column filters to use. For details see [column filters](/{{version}}/display_column_filters).

	$display->columnFilters([
	    null, // first column has no column filter
	    ColumnFilter::text()->placeholder('Title'), // second column has text column filter
	])


<a name="datatables-attributes"></a>
### Datatables Attributes	

You can set datatables attributes:	

	$display->attributes([
	    'ordering' => false,
	    'stateSave' => true,
	]);

Supported attributes:
	- `ordering` — `boolean`, is ordering feature is enabled (default is true`)
	- `stateSave` — `boolean`, is state save feature is enabled (default is `true`)


<a name="datatables-async"></a>
## Datatables async

This display extends `datatables` display. You don't have to perform any additional configuration, your datatable will become asynchronous with this display.

	…->display(function ()
	{
	    $display = AdminDisplay::datatablesAsync();
	    // configure display
	    return $display;
	})

This display has some limitations:
	- you can't sort by columns not from your table (you have to mark these column not orderable by yourself)
	- you can't search by columns not from your table
	- if you want to use async datatables with tabbed display you have to name your table: `AdminDisplay::datatablesAsync('my-table-name')`

<a name="tree"></a>
## Tree

There are 2 nested-sets packages supported:
	- https://github.com/etrepat/baum
	- https://github.com/lazychaser/laravel-nestedset

And the simplest tree based on `parent_id` and `order` fields.

If you have one of them installed and configured you can use tree display:

	…->display(function ()
	{
	    $display = AdminDisplay::tree();
	    // configure display
	    return $display;
	})


<a name="tree-display-field"></a>
### Set Displayed Field	

You must set model field to be displayed as title (default is `title`).

	$display->value('myTitleField');


<a name="tree-disable-reorder"></a>
### Disable Tree Reorder

You can enable or disable tree reordering. (default is `true`).
	
	$display->reorderable(false);


<a name="tree-simple"></a>
### Simple Tree

You can use this type if your tree based on `parent_id` and `order` columns.

You must provide column names and root parent_id (default is `null`):
	
	$display->parentField('parent_id');
	$display->orderField('order');
	$display->rootParentId(0);


<a name="tabbed"></a>
## Tabbed

You must set tabs to display:

	…->display(function ()
	{
	    $display = AdminDisplay::tabbed();
	    // configure display
	    return $display;
	})


<a name="tabs-set"></a>
### Set Tabs

You must set tabs to display:

	$display->tabs(function ()
	{
	    $tabs = [];

	    $firstTab = AdminDisplay::table();
	    // configure first tab display
	    $tabs[] = AdminDisplay::tab($firstTab)->label('First Tab')->active(true);

	    $secondTab = AdminDisplay::datatables();
	    // configure second tab display
	    $tabs[] = AdminDisplay::tab($secondTab)->label('Second Tab');

	    $thirdTab = Admin::model('App\MyOtherModel')->display();
	    // this tab will be display from 'App\MyOtherModel' configuration
	    $tabs[] = AdminDisplay::tab($thirdTab)->label('Third Tab');

	    return $tabs;
	});


<a name="custom"></a>
## Custom

You can use your own displays and render it as you want:

	…->display(function ()
	{
	    $rows = App\News::all();
	    $model = Admin::model('App\News');
	    return view('custom_display', compact('rows', 'model'));
	})

Url for the creating form will be `$model->createUrl()`.

Url for the editing form will be `$model->editUrl($id)`.