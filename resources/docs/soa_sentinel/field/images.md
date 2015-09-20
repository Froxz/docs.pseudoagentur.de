# Images

Creates images input with preview. 

Images will be uploaded to `filemanagerDirectory` from [config](/{{version}}/configuration/general). 

If you want another place to store your images - handle it by yourself in your model.

Your model must implement field accessors on this field and return array of image urls and save array as a value.

	FormItem::images('photos', 'Photos')

The simplest way to load and store images is text field with accessors:

	public function getPhotosAttribute($value)
	{
	    return preg_split('/,/', $value, -1, PREG_SPLIT_NO_EMPTY);
	}

	public function setPhotosAttribute($photos)
	{
	    $this->attributes['photos'] = implode(',', $photos);
	}