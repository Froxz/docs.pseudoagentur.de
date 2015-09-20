# Register new Form Type

You can register your own form elements in `bootstrap.php` file within `bootstrapDirectory` (default is `app/admin/bootstrap.php`).

	AdminForm::register('{type}', FormType::class)

Your class must extend `SleepingOwl\Admin\Form\FormDefault`. This includes all methods.
If you want to define it from scratch, please take a look into `SleepingOwl\Admin\Form\FormDefault.php`.


## Example

File: `app/admin/bootstrap.php`

	AdminForm::register('custom', App\Form\FormCustom::class)

File: `app/Form/FormCustom.php`

	<?php namespace App\Form;

	class FormCustom extends SleepingOwl\Admin\Form\FormDefault
	{

		protected $view = 'customformtype';

	}

### Usage in model configuration

	$form = AdminForm::custom();