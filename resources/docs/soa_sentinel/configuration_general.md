# General Configuration

The Config file `config/admin.php` includes the following attributes:


## title

String to display in page title and header.

## prefix

Url prefix for admin module.

Default: `admin`

## middleware

Middleware to use in admin routes.

Default: `['admin.auth']`

## bootstrapDirectory

Path to SleepingOwl Admin bootstrap directory. You must place your models configuration and menu configuration there. Every .php file in that directory will be included.

Default: `app_path('Admin')`

## imagesUploadDirectory

Path to upload images to. Relative to your project public directory.

Default: `images/uploads`

## template

Template class to use.

Default: `'SleepingOwl\Admin\Templates\TemplateDefault`

*Important:* This package uses the AdminLTE Template instead of SB-Admin2 as default package. 

## datetimeFormat, dateFormat, timeFormat

Default date and time formats to use with date/time columns and form items.

Defaults: 
	- Date/Time: `d.m.Y H:i`
	- Date:		 `d.m.Y`
	- Time:		 `H:i`