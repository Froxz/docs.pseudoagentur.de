# Register new Column Filter

You can register your own column filters in `bootstrap.php` file within `bootstrapDirectory` (default is `app/admin/bootstrap.php`).

	ColumnFilter::register('{type}', ColumnFilter::class)

Your class must extend `SleepingOwl\Admin\Columns\BaseColumnFilter`.

## Example

File: `app/admin/bootstrap.php`

	ColumnFilter::register('customtext', App\ColumnFilter\CustomText::class)

File: `app/ColumnFilter/CustomText.php`

	<?php namespace App\ColumnFilter;

	use SleepingOwl\Admin\AssetManager\AssetManager;

	class CustomText extends SleepingOwl\Admin\Columns\BaseColumnFilter
	{

		protected $view = 'text';
		protected $placeholder;

		/**
		 * Initialize column filter
		 */
		public function initialize()
		{
			parent::initialize();

			AssetManager::addScript('admin::default/js/columnfilters/text.js');
		}

		public function placeholder($placeholder = null)
		{
			if (is_null($placeholder))
			{
				return $this->placeholder;
			}
			$this->placeholder = $placeholder;
			return $this;
		}

		protected function getParams()
		{
			return parent::getParams() + [
				'placeholder' => $this->placeholder(),
			];
		}

		public function apply($repository, $column, $query, $search, $fullSearch, $operator = 'like')
		{
			if (empty($search)) return;

			if ($operator == 'like')
			{
				$search = '%' . $search . '%';
			}

			$name = $column->name();
			if ($repository->hasColumn($name))
			{
				$query->where($name, $operator, $search);
			} elseif (strpos($name, '.') !== false)
			{
				$parts = explode('.', $name);
				$fieldName = array_pop($parts);
				$relationName = implode('.', $parts);
				$query->whereHas($relationName, function ($q) use ($search, $fieldName, $operator)
				{
					$q->where($fieldName, $operator, $search);
				});
			}
		}

	}

### Usage in model definition
	
	$display->columnFilters([
		ColumnFilter::customtext()->placeholder('Title')
	]);

	