# Localization Configuration

SleepingOwl Admin uses locale from your `app.php` locale configuration.

## Supported Locales

Currently the packages supports the following languages:
	- en
	- ru
	- es
	- uk
	- pt_BR

## Your Own Locales

You can add your localization. Just create file `resources/lang/packages/{your_locale}/admin/lang.php`, paste everything from `vendor/pseudoagentur/soa-admin-sentinel/src/lang/en/lang.php` and make your changes. Feel free to send me your locale to add it to the main branch.

In Laravel 5.1, the lang file is `resources/lang/vendor/admin/{your_locale}/lang.php`.