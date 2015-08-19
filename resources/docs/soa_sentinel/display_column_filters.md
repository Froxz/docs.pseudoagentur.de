# Column Filters

- [Schema](#schema)
- [Supported Types](#supported-types)
	- [text](#text)
	- [select](#select)
	- [date](#date)
	- [range](#range)

<a name="schema">
## Schema		

Use this code to define column filter with `{type}` type:

	ColumnFilter::{type}()

<a name="supported-types">
## Supported Types

<a name="text">
### Text	

Column wil be filtered by text input value.

	ColumnFilter::text()	

<a name="text-placeholder">
#### Placeholder

You can add placeholder to the input field:

	ColumnFilter::text()->placeholder('Title')

<a name="select">
### Select	

Column will be filtered by value from select input.

	ColumnFilter::select()

<a name="select-placeholder">
#### Placeholder

You can add placeholder to the select field:

	ColumnFilter::select()->placeholder('Country')

<a name="select-providing-data">
#### Providing Data	

With array:

	->options([1 => 'First', 2 => 'Second', 3 => 'Third])

With enum (use array values as keys):

	->enum(['First', 'Second', 'Third])

With model:

	->model('App\MyModel')->display('title')

<a name="date">
### Date	

Column wil be filtered by timestamp.

	ColumnFilter::date()

<a name="date-placeholder">
#### Placeholder

You can add placeholder to the input field:

	ColumnFilter::date()->placeholder('Title')

<a name="date-format">
#### Format	

You can provide timestamp format:

	ColumnFilter::date()->format('d.m.Y')

<a name="range">
### Range		

Column wil be filtered from one value to another.

	ColumnFilter::range()

<a name="date-range">
#### Date Range

You can filter by date range:

	ColumnFilter::range()->from(
	    ColumnFilter::date()->format('d.m.Y')->placeholder('From Date')
	)->to(
	    ColumnFilter::date()->format('d.m.Y')->placeholder('To Date')
	)

<a name="number-range">
#### Number Range

You can filter by number range:

	ColumnFilter::range()->from(
	    ColumnFilter::text()->placeholder('From')
	)->to(
	    ColumnFilter::text()->placeholder('To')
	)