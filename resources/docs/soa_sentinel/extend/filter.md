# Register new Filter

You can register your own form elements in `bootstrap.php` file within `bootstrapDirectory` (default is `app/admin/bootstrap.php`).

	Filter::register('{type}', Filter::class)

Your class must extend `SleepingOwl\Admin\Filter\FilterBase` or `SleepingOwl\Admin\Filter\FilterField` (FilterField will be used in `Filter::scope()` and `Filter::custom()`).
If you want to define it from scratch, please take a look into `SleepingOwl\Admin\Filter\FilterBase.php`.


## Example

File: `app/admin/bootstrap.php`

	Filter::register('customfilter', App\Filter\FilterCustomFilter::class)

File: `app/Filter/FilterCustomFilter.php`

	<?php namespace App\Filter;

	class FilterCustomFilter extends SleepingOwl\Admin\Filter\FilterField
	{

		protected $callback;

		public function apply($query)
		{
			call_user_func($this->callback(), $query, $this->value());
		}

		public function callback($callback = null)
		{
			if (is_null($callback))
			{
				return $this->callback;
			}
			$this->callback = $callback;
			return $this;
		}

	}

### Usage in model configuration

	$display->filters([
		Filter::customfilter('filter_name')->callback(function ($query, $parameter)
		{
		    $query->where('myField', $parameter);
		})->title('My Filter Title')
	])