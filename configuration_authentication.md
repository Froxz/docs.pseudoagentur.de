# Authentication Configuration

Instead of the official package, this package use Cartalyst Sentinel as Authentication package and not Laravel Authentication.

With the implementation of Sentinel, the `administrators` database table is obsolete.
All users can be found in the database table `users`. 
All user roles can be found in the database table `roles`.

Both tables are in a One-To-Many Relation ( 1 User to N Roles ).

## Default Credentials
After installation you can use the following credentials to login:

	- E-Mail: admin@soa.backend
	- Password: password

## Manage Users / Roles
This package includes two Admin Models to manage the users and roles. 
There is no CLI Command to manage users or roles.

## Middleware
This package will check the permission for the current user inside the Middleware.
Permission Check uses `Sentinel::hasAnyAccess()`.

Currently, the definition is the following:

	- If the route is `admin.dashboard` it will check for the permissions `superadmin` and `controlpanel`.
	- Model has no custom permissions
		- If the route is `{adminModel}` (Model Index Page) then check for the permissions `superadmin` and `admin.{adminModel}.*`
		- If the route is `{adminModel}/{action}` (GET/POST for create/update/destroy) then check for the permissions `superadmin` and `admin.{adminModel}.{action}`
	- Model has custom permissions
		- If the route is `{adminModel}` (Model Index Page) then check for the permissions `superadmin` and `admin.{adminModel}.*` and the defined model permissions
		- If the route is `{adminModel}/{action}` (GET/POST for create/update/destroy) then check for the permissions `superadmin` and `admin.{adminModel}.{action}` and the defined model permissions

The Middleware defintion can be found in the Package in `Admin/Http/Middleware/AdminAuthenticate.php`.