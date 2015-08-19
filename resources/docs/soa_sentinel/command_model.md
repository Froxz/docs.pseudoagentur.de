# Model Command

Use this command to create new model configuration. For details see [model configuration](/{{version}}/configuration_model).

You can specify model title and columns for table view. Form elements will be grabbed from your model table structure.

## Usage

	php artisan admin:model "\Foo\MyModel" --title="My Model Title" --columns="title, image, date, entries"
	php artisan admin:model Foo/MyModel --columns="title,image,date,entries"

## Arguments	

| Name       	  | Required   	 | Default  	 | Description													 																|
| --------------- | ------------ | ------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| modelClass      | Yes 		 | None	 		 | Provide full model class name with namespace. You can write it in quotes with backslash or without quotes with forward slash.|

## Options	

| Name       | Required   	 | Default  	 | Description													 										|
| ---------- | ------------- | ------------- | ---------------------------------------------------------------------------------------------------- |
| title      | No 			 | None	 		 | Set title for your model	 																			|
| columns	 | No 			 | None			 | Comma-separated list of all columns in table view. Type of columns will be guessed from your model. 	|


## What will it do for you

This command creates new file with model configuration within `bootstrapDirectory`, called `{modelClass}.php`. 
Eager relations, column types, filters and form elements will be guessed from provided data, your model class and database structure.

## Column Type Guesser

	- count – if model has relation `has-many` on this field.
	- lists – if model has relation `belongs-to-many` on this field (you must provide field to display in list, e.g. `entries.title`, where `entries` is you eager relation).
	- date – if this column has `date`, `time` or `timestamp` type in database.
	- string – in other cases.

## Form Element Guesser

	- select – if model has `belongs-to` relation on this field or this field is enum.
	- text – if field type in database is `varchar`, `int` or `float`.
	- ckeditor – if field type in database is `text`.
	- checkbox – if field type in database is `boolean` (`tinyint(1)`).
	- date – if field type in database is `date`.
	- time – if field type in database is `time`.
	- timestamp – if field type in database is `timestamp`.