# Column Filters

- [Schema](#scheme)
- [Supported Types](#supported-types)
	- [text](#text)
	- [select](#select)
	- [date](#date)
	- [range](#range)

<a name="scheme"></a>
## Scheme		

Use this code to define column filter with `{type}` type:

	ColumnFilter::{type}()

<a name="supported-types"></a>
## Supported Types

<a name="text"></a>
### Text	

Column wil be filtered by text input value.

	ColumnFilter::text()	

<a name="text-placeholder"></a>
#### Placeholder

You can add placeholder to the input field:

	ColumnFilter::text()->placeholder('Title')

<a name="select"></a>
### Select	

Column will be filtered by value from select input.

	ColumnFilter::select()

<a name="select-placeholder"></a>
#### Placeholder

You can add placeholder to the select field:

	ColumnFilter::select()->placeholder('Country')

<a name="select-providing-data"></a>
#### Providing Data	

With array:

	->options([1 => 'First', 2 => 'Second', 3 => 'Third])

With enum (use array values as keys):

	->enum(['First', 'Second', 'Third])

With model:

	->model('App\MyModel')->display('title')

<a name="date"></a>
### Date	

Column wil be filtered by timestamp.

	ColumnFilter::date()

<a name="date-placeholder"></a>
#### Placeholder

You can add placeholder to the input field:

	ColumnFilter::date()->placeholder('Title')

<a name="date-format"></a>
#### Format	

You can provide timestamp format:

	ColumnFilter::date()->format('d.m.Y')

<a name="range"></a>
### Range		

Column wil be filtered from one value to another.

	ColumnFilter::range()

<a name="date-range"></a>
#### Date Range

You can filter by date range:

	ColumnFilter::range()->from(
	    ColumnFilter::date()->format('d.m.Y')->placeholder('From Date')
	)->to(
	    ColumnFilter::date()->format('d.m.Y')->placeholder('To Date')
	)

<a name="number-range"></a>
#### Number Range

You can filter by number range:

	ColumnFilter::range()->from(
	    ColumnFilter::text()->placeholder('From')
	)->to(
	    ColumnFilter::text()->placeholder('To')
	)