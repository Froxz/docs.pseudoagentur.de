# Chosen

Creates select input with <a href="https://harvesthq.github.io/chosen/" target="_blank">Chosen</a>.

	FormItem::chosen('category_id', 'Category')

## Providing Data

### With array

	->options([1 => 'First', 2 => 'Second', 3 => 'Third'])

### With Array but without sorting

	->options([3 => 'Third', 1 => 'First', 2 => 'Second'], false)   

### With enum (use array values as keys)

	->enum(['First', 'Second', 'Third'])

### With model

	->model('App\MyModel')->display('title')

## Nullable Field

You can mark select to be nullable:

	…->nullable()