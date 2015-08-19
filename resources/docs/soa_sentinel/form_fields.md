# Form Fields

- [General](#general)
	- [Scheme](#scheme)
	- [Validation](#validation)
	- [Default Value](#default-value)
	- [Register Custom Field](#register-custom-field)
- [Supported Fields](#supported-fields)
	- [columns](#columns)
	- [text](#text)
	- [textaddon](#textaddon)
	- [hidden](#hidden)
	- [checkbox](#checkbox)
	- [date](#date)
	- [time](#time)
	- [timestamp](#timestamp)
	- [file](#file)
	- [image](#image)
	- [images](#images)
	- [select](#select)
	- [radio](#radio)
	- [textarea](#textarea)
	- [ckeditor](#ckeditor)
	- [custom](#custom)
	- [view](#view)


<a name="general"></a>
## General

<a name="scheme"></a>
### Scheme

You can create form item with the following code:

	FormItem::{type}('{field name}', '{label}')

<a name="validation"></a>
### Validation

	FormItem::text('title')->required()->unique()->validationRule('my-custom-rule')

See details about [validation](/{{version}}/configuration_validation).

<a name="default-value"></a>
### Default Value

You can set default value for form element.

	FormItem::text('title')->defaultValue('My new item title')

<a name="register-custom-field"></a>
### Register Custom Form Item

You can register your own form elements in `bootstrap.php` file within `bootstrapDirectory` (default is `app/admin/bootstrap.php`).

	FormItem::register('{type}', 'App\MyFormItem')

Your class must extend `SleepingOwl\Admin\FormItems\BaseFormItem` (if you dont want to get value from your instance by name) or `SleepingOwl\Admin\FormItems\NamedFormItem` (in opposite case).

<a name="custom-field-assets"></a>
#### Adding Custom Scripts and Styles

You can add custom scripts and styles to the page header, that uses your custom form element.

	public function initialize()
	{
	    parent::initialize();

	    AssetManager::addScript(asset('my.js'));
	    AssetManager::addStyle(asset('my.css'));
	}

<a name="custom-field-example"></a>
#### Example

`app/admin/bootstrap.php`

FormItem::register('myItem', 'FormItems\MyItem')

`app/FormItems/MyItem.php`

	use SleepingOwl\Admin\FormItems\NamedFormItem;

	class MyItem extends NamedFormItem
	{

	    public function render()
	    {
	        $params = $this->getParams();
	        // $params will contain 'name', 'label', 'value' and 'instance'
	        return view('my-form-item-view, $params);
	    }

	}
Usage in model configuration

	FormItem::myItem('field')->label('My Label');

<a name="supported-fields"></a>
## Supported Fields

<a name="columns"></a>
### columns

Creates multicolumn form. Use columns() method to divide form items onto columns.

	FormItem::columns()->columns([
	    [
	        FormItem::...
	    ],
	    [
	        ...
	    ],
	])

<a name="text"></a>
### text

Creates text input.

	FormItem::text('title', 'Title')

<a name="textaddon"></a>
### textaddon

Creates text input with addon in front or end.

Default placement is `before`.

	FormItem::textaddon('url', 'Url')->addon('http://my-site.com/')->placement('before')
	FormItem::textaddon('price', 'Price')->addon('$')->placement('after')

<a name="hidden"></a>
### hidden

Creates hidden input. Usefull with table display parameters (see [details](/{{version}}/display_types#table-set-parameters)).

	FormItem::hidden('field')

<a name="checkbox"></a>
### checkbox

Creates checkbox with label.

	FormItem::checkbox('active', 'Active')

<a name="date"></a>
### date

Creates date input.

	FormItem::date('date', 'Date')

Default format is described in [config](/{{version}}/configuration_general) `dateFormat` property. You can override it using `format($format)` method.

	FormItem::date('date', 'Date')->format('d.m.Y')

<a name="time"></a>
### time

Creates time input.

	FormItem::time('time', 'Time')

Default format is described in [config](/{{version}}/configuration_general) `timeFormat` property. You can override it using `format($format)` method.

	FormItem::time('time', 'Time')->format('H:i')

#### Display Seconds

	FormItem::time('time', 'Time')->format('H:i:s')->seconds(true)

<a name="timestamp"></a>
### timestamp

Creates timestamp input.

	FormItem::timestamp('timestamp', 'Timestamp')

Default format is described in [config](/{{version}}/configuration_general) `datetimeFormat` property. You can override it using `format($format)` method.

	FormItem::timestamp('timestamp', 'Timestamp')->format('d.m.Y H:i')

#### Display Seconds

	FormItem::timestamp('timestamp', 'Timestamp')->format('d.m.Y H:i:s')->seconds(true) 

<a name="file"></a>
### file

Creates file input. File will be uploaded to `imagesUploadDirectory` from [config](/{{version}}/configuration_general). If you want another place to store your files - handle it by yourself in your model.

	FormItem::file('file', 'File')

<a name="image"></a>
### image

Creates image input with preview. Image will be uploaded to `imagesUploadDirectory` from [config](/{{version}}/configuration_general). If you want another place to store your images - handle it by yourself in your model.

	FormItem::image('photo', 'Photo')

<a name="images"></a>
### images

Creates images input with preview. Images will be uploaded to `imagesUploadDirectory` from [config](/{{version}}/configuration_general). If you want another place to store your images - handle it by yourself in your model.

Your model must implement field accessors on this field and return array of image urls and save array as a value.

	FormItem::images('photos', 'Photos')

The simplest way to load and store images is text field with accessors:

	public function getPhotosAttribute($value)
	{
	    return preg_split('/,/', $value, -1, PREG_SPLIT_NO_EMPTY);
	}

	public function setPhotosAttribute($photos)
	{
	    $this->attributes['photos'] = implode(',', $photos);
	}

<a name="select"></a>
### select

Creates select input.

	FormItem::select('category_id', 'Category')

#### Providing Data

With array:

	->options([1 => 'First', 2 => 'Second', 3 => 'Third'])

With Array but without sorting:

	->options([3 => 'Third', 1 => 'First', 2 => 'Second'], false)	

With enum (use array values as keys):

	->enum(['First', 'Second', 'Third'])

With enum (use array values as keys):

	->enum(['Third', 'Second', 'First'], false)

With model:

	->model('App\MyModel')->display('title')

#### Nullable Field

You can mark select to be nullable:

	…->nullable()

<a name="multiselect"></a>
### multiselect

Creates multiple select input.

	FormItem::multiselect('categories', 'Categories')

#### Providing Data

With array:

	->options([1 => 'First', 2 => 'Second', 3 => 'Third])

With enum (use array values as keys):

	->enum(['First', 'Second', 'Third])

With class:

	->model('App\MyModel')->display('title')

#### Saving Data

Create new mutator method in your model. Here is an example:

	public function setCategoriesAttribute($categories)
	{
	    $this->categories()->detach();
	    if ( ! $categories) return;
	    if ( ! $this->exists) $this->save();

	    $this->categories()->attach($categories);
	}

`categories()` method creates `belongs-to-many` relation in this case.

<a name="radio"></a>
### radio

Creates radio input.

	FormItem::radio('category_id', 'Category')

#### Providing Data

With array:

	->options([1 => 'First', 2 => 'Second', 3 => 'Third])
	
With enum (use array values as keys):

	->enum(['First', 'Second', 'Third])

With model:

	->model('App\MyModel')->display('title')

#### Nullable Field

You can mark radio element to be nullable:

	…->nullable()

<a name="textarea"></a>
### textarea

Creates textarea.

	FormItem::textarea('text', 'Text')

<a name="ckeditor"></a>
### ckeditor

Creates ckeditor instance.

	FormItem::ckeditor('text', 'Text')

<a name="custom"></a>
### custom

Creates custom form item. You must specify display method (`display()`) and save method (`callback()`).

	FormItem::custom()->display(function ($instance)
	{
	    return view('my-form-item', ['instance' => $instance]);
	})->callback(function ($instance)
	{
	    $instance->myField = 12;
	})

<a name="view"></a>
### view

Insert your custom view. You can write there anything you want and insert scripts. View will be rendered with `$instance` variable.

	FormItem::view('admin.article.view')