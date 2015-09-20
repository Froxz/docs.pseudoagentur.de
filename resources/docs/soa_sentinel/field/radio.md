# Radio

Creates radio input.

	FormItem::radio('category_id', 'Category')

## Providing Data

### With array

	->options([1 => 'First', 2 => 'Second', 3 => 'Third])

### With enum (use array values as keys)

	->enum(['First', 'Second', 'Third])

### With model

	->model('App\MyModel')->display('title')

## Nullable Field

You can mark radio element to be nullable:

	…->nullable()