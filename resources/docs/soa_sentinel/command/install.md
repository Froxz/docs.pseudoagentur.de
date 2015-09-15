# Install Command

Use this command to run initial configuration of SleepingOwl Admin. It creates all necessary files and directories.

## Usage

	php artisan admin:install --title="My Admin Title"

## Options	

| Name       | Required   	 | Default  	 | Description													 |
| ---------- | ------------- | ------------- | ------------------------------------------------------------- |
| title      | No 			 | SOA Backend	 | With this parameter you can change the Title of the Backend	 |


## What will it do for you

- Set Admin Title (optional)
- Publish config, migration and assets for SleepingOwl Admin
- Publish config, migration and assets for Cartalyst Sentry
- Run DB Migration
- Remove Laravel Auth (also known as `php artisan fresh`)
- Create bootstrap directory.
- Create initial menu configuration file.
- Create initial bootstrap file.
- Create initial routes file.
- Create Users Admin Model
- Create Roles Admin Model
- Create structure for public directory (create images/uploads directories)
- Create Default Admin User