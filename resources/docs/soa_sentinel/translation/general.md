# Translation

<!-- MarkdownTOC -->

- [Implementation](#implementation)
- [Example](#example)

<!-- /MarkdownTOC -->


Since Version `3.0.1` it's possible to use translatable models.

We're using the <a href="https://github.com/dimsav/laravel-translatable" target="_blank">dimsav/laravel-translatable</a> package for this.
Please check the package documentation to get detailed informations about the available variables inside the model definition.

<a name="implementation"></a>
## Implementation

### Admin Model
At first you have to add the `translate()` method to your `Admin::model()` function.

	Admin::model()->translate(true)

After this you have to call the `with()` method in the `display()` function.

	$display->with('translations');

by default, the admin package will check for the default locale in the `config/app.php` and will
display you the translated value (if available).

As next step you have to add the `lang()` method to the fields which should be translatable.

	FormItem::text('companyName', 'Company Name DE')->lang("de"),
	FormItem::text('companyName', 'Company Name EN')->lang("en"),

### Model

#### Translation Model

You have to define a new model which handles the translatable fields.
Please check the `app/Entities/CompanyTranslation.php` from the [Example](#example).

#### Company Model

You only have to add the following lines to your model to enable the translatable functionality.

	use \Dimsav\Translatable\Translatable;
	public $translationModel = 'App\Entities\CompanyTranslation';
	public $translatedAttributes = ['companyName'];


<a name="example"></a>
## Example

Here an short example how it should looks like:

File: `app/Admin/Company.php`
	
	<?php

	Admin::model('App\Entities\Company')->translate(true)->title('Translatable Companies')->display(function ()
	{
		$display = AdminDisplay::table();
		$display->with('translations');
		$display->columns([
			Column::string('title')->label('Title'),
			Column::string('companyName')->label('Company Name'),
			Column::string('address')->label('Address'),
		]);
		return $display;
	})->createAndEdit(function ($id)
	{
		$form = AdminForm::form();
		$form->ajax_validation(true);
		$form->items([
			FormItem::hidden('contact_id'),
			FormItem::text('title', 'Title')->required()->unique(),
			FormItem::text('companyName', 'Company Name DE')->lang("de")->required(),
			FormItem::text('companyName', 'Company Name EN')->lang("en"),
			FormItem::text('address', 'Address'),
			FormItem::text('address', 'Address'),
			FormItem::text('phone', 'Phone'),
		]);
		return $form;
	});

File: `app/Entities/Company.php`

	<?php namespace App\Entities;

	use Illuminate\Database\Eloquent\Model;

	class Company extends Model
	{
		use \Dimsav\Translatable\Translatable;

		public $translationModel = 'App\Entities\CompanyTranslation';
		public $translatedAttributes = ['companyName'];
		protected $table = 'companies';

		protected $fillable = [
			'title',
			'address',
			'phone'
		];

		protected $hidden = [
			'created_at',
			'updated_at'
		];
	}

File: `app/Entities/CompanyTranslation.php`

	<?php namespace App\Entities;

	use Illuminate\Database\Eloquent\Model;

	class CompanyTranslation extends Model
	{
		public $timestamps = false;
	    protected $fillable = ['companyName'];
	}	

File: `database/migrations/<timestamp>_companies_table.php`

	<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

	class CreateCompaniesTable extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('companies', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('title')->unique();
				$table->string('address');
				$table->string('phone');
				$table->timestamps();
			});
		}


		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::drop('companies');
		}

	}

File: `database/migrations/<timestamp>_CompanyTranslation.php`

	<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CompanyTranslation extends Migration
	{
	    /**
	     * Run the migrations.
	     *
	     * @return void
	     */
	    public function up()
	    {
	        Schema::create('company_translations', function(Blueprint $table)
	        {
	            $table->increments('id');
	            $table->integer('company_id')->unsigned();
	            $table->string('companyName');
	            $table->string('locale')->index();

	            $table->unique(['company_id','locale']);
	            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
	        });
	    }

	    /**
	     * Reverse the migrations.
	     *
	     * @return void
	     */
	    public function down()
	    {
	        Schema::drop('company_translations');
	    }
	}
