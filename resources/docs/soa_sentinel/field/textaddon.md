# TextAddon

Creates text input with addon in front or end.

Default `placement()` is `before`.

	FormItem::textaddon('url', 'Url')->addon('http://my-site.com/')->placement('before')
	FormItem::textaddon('price', 'Price')->addon('$')->placement('after')