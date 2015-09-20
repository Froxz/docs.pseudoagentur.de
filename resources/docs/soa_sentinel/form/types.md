# Form Types

<!-- MarkdownTOC -->

- [Default Form](#default-form)
- [Horizontal Form](#horizontal-form)
- [Tabbed Form](#tabbed-form)
- [Panel Form](#panel-form)

<!-- /MarkdownTOC -->

<a name="default-form"></a>
## Default Form

To create an simple form with vertical fields you have to add the following to your admin model:

	..->createAndEdit(function ()
	{
	    $form = AdminForm::form();
	    $form->items([
	        // create form items here
	    ]);
	    return $form;
	})

<a name="horizontal-form"></a>
## Horizontal Form

If you want to use a horizontal form, you have to add the `$form->horizontal(true)` to your form (default is `false`).
Now you are able to change the width from the labels and the fields with `$form->label_size('col-xs-6 col-sm-4 col-md-3 col-lg-2')` and `$form->field_size('col-xs-6 col-sm-8 col-md-9 col-lg-10')`.
This both options are optional. Default for `label_size` is `col-sm-2`. Default for `field_size` is `col-sm-10`.

Horizontal Form can also be used in [Tabbed Forms](#tabbed-form) and [Panel Forms](#panel-form).

	..->createAndEdit(function ()
	{
	    $form = AdminForm::form();
	    
	    $form->horizontal(true);
	    $form->label_size('col-sm-4');
	    $form->field_size('col-sm-8');
	    
	    $form->items([
	        // create form items here
	    ]);
	    return $form;
	})

<a name="tabbed-form"></a>
## Tabbed Form

If you want to use tabs in your form, you have to add the following to your admin model:

	..->createAndEdit(function ()
	{
	    $form = AdminForm::tabbed();
	    $form->items([
	        'Main Tab Label' => [
	            // form items
	        ],
	        'Second Tab Label' => [
	            // form items
	        ],
	    ]);
	    return $form;
	})

<a name="panel-form"></a>
## Panel Form

If you want to use panels in your form, you have to add the following to your admin model:

	..->createAndEdit(function ()
	{
	    $form = AdminForm::panel();
	    $form->items([
	        'Main Panel Label' => [
	            // form items
	        ],
	        'Second Panel Label' => [
	            // form items
	        ],
	    ]);
	    return $form;
	})