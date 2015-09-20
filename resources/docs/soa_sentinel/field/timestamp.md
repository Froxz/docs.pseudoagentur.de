# Timestamp

Creates timestamp input.

	FormItem::timestamp('timestamp', 'Timestamp')

Default format is described in the [configuration](/{{version}}/configuration/general) `datetimeFormat` property. 

You can override it using format($format) method.

	FormItem::timestamp('timestamp', 'Timestamp')->format('d.m.Y H:i')

## Display Seconds

	FormItem::timestamp('timestamp', 'Timestamp')->format('d.m.Y H:i:s')->seconds(true) 