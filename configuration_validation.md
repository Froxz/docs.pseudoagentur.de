# Validation Configuration

You can add validation rules to your form elements:

	FormItem::text('title')->required()->unique()->validationRule('my-custom-rule')

Use `unique()` to set this field to be unique in this model.

You can use `validationRule($rule)` to add any rule you want. You can use pipe delimiter `|`.	