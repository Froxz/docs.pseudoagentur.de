# Installation

- [Installation](#installation)
    - [Requirements](#requirements)
    - [Choose Branch](#choose-branch)
        - [Development Branch](#master-branch)
        - [Master Branch](#master-branch)
    - [Composer](#composer)
    - [File Modifications](#file-modifications)
    - [Run install command](#install-command)
    - [Login](#login)

<a name="installation"></a>
## Installation

### Requirements

To use the SleepingOwl Admin Package with Cartalyst Sentinel Integration you need the following:

<div class="content-list" markdown="1">
- Composer
- Installed and configured Laravel 5.1.* Environment
</div>


<a name="choose-branch"></a>
### Choose Branch

<a name="development-branch"></a>
#### Development Branch
If you want to use the Development Branch, you have to add the following to the `require` list in your `composer.json`

    "pseudoagentur/soa-sentinel" : "dev-develop"

<a name="master-branch"></a>
#### Master Branch

If you want to use the Master Branch, you have to add the following to the `require` list in your `composer.json`

    "pseudoagentur/soa-sentinel" : "dev-master"    

<a name="composer"></a>
### Composer

Now you have to run `composer update` to get the required packages.

*The Sentinel Package is included in the package composer.json, so you don't need to add them to the global composer.json file.*

<a name="file-modifications"></a>
### File Modifications

After the successful composer update, you have to open the `config/app.php`.

Add the following at the end of the `providers` array:

    'Cartalyst\Sentinel\Laravel\SentinelServiceProvider',
    'SleepingOwl\Admin\AdminServiceProvider',

Add the following at the end of the `aliases` array:    
    
    'Activation'    => 'Cartalyst\Sentinel\Laravel\Facades\Activation',
    'Reminder'      => 'Cartalyst\Sentinel\Laravel\Facades\Reminder',
    'Sentinel'      => 'Cartalyst\Sentinel\Laravel\Facades\Sentinel',

    'Admin'         => 'SleepingOwl\Admin\Admin',
    'Column'        => 'SleepingOwl\Admin\Columns\Column',
    'ColumnFilter'  => 'SleepingOwl\Admin\ColumnFilters\ColumnFilter',
    'Filter'        => 'SleepingOwl\Admin\Filter\Filter',
    'AdminDisplay'  => 'SleepingOwl\Admin\Display\AdminDisplay',
    'AdminForm'     => 'SleepingOwl\Admin\Form\AdminForm',
    'AdminTemplate' => 'SleepingOwl\Admin\Templates\Facade\AdminTemplate',
    'FormItem'      => 'SleepingOwl\Admin\FormItems\FormItem',

<a name="install-command"></a>
### Run install command
    
Last but not least we have to run the install command, which will create all tables and files for us.
Detailed information about the install command can be found in the [install command documentation](/{{version}}/command_install).

    php artisan admin:install

<a name="login"></a>
### Login
Now you're done - Good job!

Now you can login into the Admin Panel with the following credentials:
- URL: `<your-site-url>/admin/`
- E-Mail: `admin@soa.backend`
- Password: `password`