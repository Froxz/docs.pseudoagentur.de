# Date

Creates date input.

	FormItem::date('date', 'Date')

Default format is described in the [configuration](/{{version}}/configuration/general) `dateFormat` property. 

You can override it using `format($format)` method.

	FormItem::date('date', 'Date')->format('d.m.Y')