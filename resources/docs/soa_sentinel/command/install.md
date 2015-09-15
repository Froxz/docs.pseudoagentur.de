# Install Command

Use this command to run initial configuration of SleepingOwl Admin. It creates all necessary files and directories.

## Usage

	php artisan admin:install --title="My Admin Title" --path="customfilesdirectory_in_public"

## Options	

| Name       | Required   	 | Default  	 | Description													 							 |
| ---------- | ------------- | ------------- | ----------------------------------------------------------------------------------------- |
| title      | No 			 | SOA Backend	 | With this parameter you can change the Title of the Backend	                             |
| path       | No 			 | files/	 	 | Path for filemanager directory relative to public directory. Please set no / at the end!	 |


## What will it do for you

- Set Admin Title (optional)
- Publish SOA Sentinel Package
- Publish Cartalyst Sentinel Package
- Publish JSValidation Package
- Publish elFiner Package
- Remove Laravel Auth (also known as `php artisan fresh`)
- Run DB Migration
- Create bootstrap directory.
- Create initial menu configuration file.
- Create initial bootstrap file.
- Create initial routes file.
- Create Users Admin Model
- Create Roles Admin Model
- Create structure for public directory (create files directory or if defined the directory from `--path` )
- Create Default Admin User