# TinyMCE

Creates a tinymce instance.

	FormItem::tinymce('text', 'Text')

## Selector

This method allows you to specify a CSS selector for the areas that TinyMCE should make editable.

	FormItem::tinymce('text', 'Text')->mce_selector('tinymceeditor')

## Config

This method allows you to extend the TinyMCE toolbar.

	FormItem::tinymce('text', 'Text')->mce_config([])

Here an short example:

	FormItem::tinymce('text', 'Text')->mce_config([
	    'language' => 'de',
	    'plugins' => [
	        'bootstrap',
	        'fontawesome noneditable',
	        'visualblocks',
	        'code',
	        'link',
	        'image'
	    ],
	    'extended_valid_elements' => 'span[class]',
	    'content_css' => '//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
	    'bootstrapConfig' => [
	        'bootstrapElements' =>  [
	            'btn' => true,
	            'table' => true,
	            'template' => true,
	            'label' => true,
	            'alert'=> true
	        ],
	    ],
	    'toolbar1' => "undo redo | styleselect | bold italic | link image alignleft aligncenter alignright",
	    'toolbar2' => 'bootstrap | visualblocks | fontawesome',
	    'file_picker_callback' => 'elFinderBrowser',
	    'content_style' => '.mce-content-body { padding: 4px }',
	]),