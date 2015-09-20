# Time

Creates time input.

	FormItem::time('time', 'Time')

Default format is described in the [configuration](/{{version}}/configuration/general) `timeFormat` property. 

You can override it using `format($format)` method.

	FormItem::time('time', 'Time')->format('H:i')

## Display Seconds

	FormItem::time('time', 'Time')->format('H:i:s')->seconds(true)