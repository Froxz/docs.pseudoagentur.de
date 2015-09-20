# Register new Form Item

You can register your own form elements in `bootstrap.php` file within `bootstrapDirectory` (default is `app/admin/bootstrap.php`).

	FormItem::register('{type}', MyFormItem::class)

Your class must extend `SleepingOwl\Admin\FormItems\BaseFormItem` (if you dont want to get value from your instance by name) or `SleepingOwl\Admin\FormItems\NamedFormItem` (in opposite case).


## Adding Custom Scripts and Styles

You can add custom scripts and styles to the page header, that uses your custom form element.

	public function initialize()
	{
	    parent::initialize();

	    AssetManager::addScript(asset('my.js'));
	    AssetManager::addStyle(asset('my.css'));
	}

## Adding Custom view

You can use one of the existing field views or you can create your own.

Existing views can be found at `/vendor/pseudoagentur/seo-sentinel/src/views/formitem`

If you want to use your own, the view must be stored in `/Resources/views/vendor/admin-lte/default/formitem/`.


## Example

File: `app/admin/bootstrap.php`

	FormItem::register('myItem', App\FormItems\MyItem::class)

File: `app/FormItems/MyItem.php`

	<?php namespace App\FormItems
	
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

### Usage in model configuration

	FormItem::myItem('field')->label('My Label');