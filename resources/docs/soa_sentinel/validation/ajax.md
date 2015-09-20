# Ajax Validation

<!-- MarkdownTOC -->

- [Enable Ajax Validation](#enable-ajax-validation)
- [Example](#example)

<!-- /MarkdownTOC -->

<a name="enable-ajax-validation"></a>
## Enable Ajax Validation

To use the ajax validation you only have to add the following line to your form definition:

	$form->ajax_validation(true);

The admin package will do the rest, this means:

- Loading all required assets
- generate the validation rules object which will be used to check each field

<a name="example"></a>
## Example

	Admin::model('App\Entities\Company')->title('Companies')->display(function ()
	{
		$display = AdminDisplay::table();
		$display->columns([
			Column::string('title')->label('Title'),
			Column::string('companyName')->label('Company Name'),
			Column::string('address')->label('Address'),
		]);
		return $display;
	})->createAndEdit(function ($id)
	{
		$form = AdminForm::form();
		$form->ajax_validation(true);
		$form->items([
			FormItem::hidden('contact_id'),
			FormItem::text('title', 'Title')->required()->unique(),
			FormItem::text('companyName', 'Company Name')->required(),
			FormItem::text('address', 'Address'),
			FormItem::text('address', 'Address'),
			FormItem::text('phone', 'Phone'),
		]);
		return $form;
	});