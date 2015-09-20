# Validation

<!-- MarkdownTOC -->

- [required](#required)
- [unique](#unique)
- [Custom Rules](#custom-rules)

<!-- /MarkdownTOC -->

<a name="required"></a>
## required

To define a field as required, you only have to add the `->required()` method to your form item.
The `->required()` method will also add an asterisks to the field label.

	FormItem::text('title', 'Title')->required(),

<a name="unique"></a>
## unique

To define a field as unique, you only have to add the `->unique()` method to your form item.
The `->unique()` method will check in the current model if there is already an record with this value.

	FormItem::text('title', 'Title')->unique(),

<a name="custom-rules"></a>
## Custom Rules

To define a custom rule you can use the `->validationRule()` method.

	FormItem::text('title', 'Title')->validationRule('my-custom-rule')	

To define multiple rules you can use the `->validationRules()` method. To split each rule, to can use pipe ( `|` ) as delimiter.

	FormItem::text('title', 'Title')->validationRules('required|size:10'),


Please vist the <a href="http://laravel.com/docs/5.1/validation#available-validation-rules" target="_blank">official laravel documentation</a>, to see all available validation rules.

