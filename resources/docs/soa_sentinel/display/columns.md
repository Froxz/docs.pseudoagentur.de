#Columns

<!-- MarkdownTOC depth=3 -->

- [General](#general)
    - [Scheme](#scheme)
    - [Column Header](#column-header)
    - [Restrict Column Sort](#restrict-column-sort)
    - [Column Appendants](#column-appendants)
- [Supported Types](#supported-types)
    - [String](#string)
    - [Lists](#lists)
    - [Count](#count)
    - [Image](#image)
    - [Datetime](#datetime)
    - [Order](#order)
    - [Action](#action)
    - [Checkbox](#checkbox)
    - [Custom](#custom)

<!-- /MarkdownTOC -->



<a name="general"></a>
## General

<a name="scheme"></a>
### Scheme

Use this code to define column with `{type}` type:

    Column::{type}('{field name}')

<a name="column-header"></a>
### Column Header

You can set column header label for each column type:

    …->label('My Column Header')


<a name="restrict-column-sort"></a>
### Restrict Column Sort

    Column::string('my_field')->orderable(false)

<a name="column-appendants"></a>
### Column Appendants

<a name="filter-appendant"></a>
#### Filter Appendant

It will add filter button to every column cell, that links to model display filter. You can omit `model()` definition if you want to use the current model.

    Column::filter('{filter_alias}')->model('App\MyModel')->value('{field to grab filter value from}')

Example:

    Column::string('category.title')->label('Category')->append(
        Column::filter('category_id')
    )

<a name="url-appendant"></a>
#### Url Appendant

It will add button to every column cell, that links to provided in model field url.

    Column::url('{field to grab url from}')

Example:

    Column::string('url', 'Url')->append(
        Column::url('full_url')
    )

<a name="supported-types"></a>
## Supported Types

<a name="string"></a>
### String

Cell content will be simple field value from your model or one of related models.

    Column::string('{field name}')

<a name="string-field-name"></a>
#### Field Name

Field name can be one of the following:

Field from your model (from database or using mutators).

    Column::string('title')
    Column::string('url')

Field from your model relations

    Column::string('category.title') // category() creates belongs-to relation
    Column::string('city.state.title') // you can use nested relations

<a name="lists"></a>
### Lists

Cell content will be list of related models. Used in many-to-many relations.

    Column::lists('categories.title')

It will display list of all category titles associated with current entity.
`categories()` must create `belongs-to-many` relation in this case.

<a name="count"></a>
### Count

Cell content will be count of related models. Used in has-many relations.

    Column::count('images')
    Column::count('images')->append(
        Column::filter('school_id')->model('App\SchoolImage')
    )

`images()` must create `has-many` relation in this case.

<a name="image"></a>
### Image

Cell content will be an image thumbnail.

    Column::image('photo')

`photo` must be return full url to the image or path related from your project public directory.
Image columns can`t be sortable.

<a name="datetime"></a>
### Datetime

Cell content will be date or time value.

    Column::datetime('{field}')

<a name="datetime-format"></a>
#### Format Date and Time

Default format is defined in config `datetimeFormat` property. You can override it with `format($format)` method.

    Column::datetime('created_at')->format('d.m.Y H:i:s')
    Column::datetime('created_at')->format('m/d/Y g:i')

<a name="order"></a>
### Order

Cell content will be up and down arrows.

    Column::order()

Your model must include use `SleepingOwl\Admin\Traits\OrderableModel;` trait in order to use this column type. Your model must contain integer field that represents order of entities. You must implement `getOrderField()` method in your model and return this field name:

    public function getOrderField()
    {
        return 'order';
    }

Example

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Category extends Model
    {
        use SleepingOwl\Admin\Traits\OrderableModel;

        public function getOrderField()
        {
            return 'order';
        }
    }

<a name="action"></a>
### Action

Cell content will be button with custom action.

    Column::action('{name}')

#### Button Styling

You can specify icon class to use (from FontAwesome):

    Column::action('show')->icon('fa-globe')

2 styles are available: `short` and `long`

    # This will create button without label, only with icon. Label will popup on hover.
    Column::action('show')->label('Label')->icon('fa-globe')->style('short')

    # This will create button with icon and label
    Column::action('show')->label('Label')->icon('fa-globe')->style('long')

Defaults: default style is `long` without icon.

#### Button Target

You can specify target for button:

    Column::action('show')->label('Column Label')->value('Button Text')->url('http://test.com/:id')->target('_blank')

#### URL Usage

You can specify url for button, `:id` will be replaced with the clicked row id:

    Column::action('show')->label('Label')->url('http://test.com/:id')

or you can provide callback to generate url:

    Column::action('show')->label('Label')->url(function ($instance)
    {
        return URL::route('my-route', [$instance->id]);
    })

#### Custom Actions Usage
Use `->callback()` method to set custom action:

    Column::action('show')->label('Label')->callback(function ($instance)
    {
        # Any code you want
    })

<a name="checkbox"></a>
### Checkbox
    
Checkbox column is used to perform bulk actions.

    Column::checkbox()

For details see [bulk actions](/{{version}}/display/general#bulk-actions).

<a name="custom"></a>
### Custom

This column type uses your callback to get cell value.

    Column::custom()->label('Published')->callback(function ($instance)
    {
        return $instance->published ? '&check;' : '-';
    }),