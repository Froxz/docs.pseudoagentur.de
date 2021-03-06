# Register new Display Type

You can register your own form elements in `bootstrap.php` file within `bootstrapDirectory` (default is `app/admin/bootstrap.php`).

	AdminDisplay::register('{type}', DisplayType::class)


## Example

File: `app/admin/bootstrap.php`

	Filter::register('customdatatables', App\Display\CustomDatatables::class)

File: `app/Display/CustomDatatables.php`

	<?php namespace SleepingOwl\Admin\Display;

	use SleepingOwl\Admin\AssetManager\AssetManager;
	use SleepingOwl\Admin\Interfaces\ColumnFilterInterface;

	class DisplayDatatables extends SleepingOwl\Admin\Display\DisplayTable
	{

		/**
		 * View to render
		 * @var string
		 */
		protected $view = 'datatables';
		/**
		 * Datatables order
		 * @var array
		 */
		protected $order = [
			[
				0,
				'asc'
			]
		];
		protected $columnFilters 	= [];
		protected $attributes 		= [];

		protected $exportButtons	= [];

		/**
		 * Initialize display
		 */
		public function initialize()
		{
			parent::initialize();

			foreach ($this->columnFilters() as $columnFilter)
			{
				if ($columnFilter instanceof ColumnFilterInterface)
				{
					$columnFilter->initialize();
				}
			}

			AssetManager::addScript('admin::default/plugins/datatables/jquery.dataTables.min.js');
			AssetManager::addScript('admin::default/plugins/datatables/dataTables.bootstrap.min.js');
			AssetManager::addScript('admin::default/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js');
			AssetManager::addScript('admin::default/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js');
			AssetManager::addScript('admin::default/plugins/datatables/extensions/Buttons/js/buttons.flash.min.js');
			AssetManager::addScript('admin::default/plugins/datatables/extensions/Buttons/js/buttons.print.min.js');
			AssetManager::addScript('admin::default/plugins/datatables/extensions/Buttons/js/buttons.colVis.min.js');
			AssetManager::addScript('admin::default/plugins/datatables/extensions/Buttons/js/buttons.bootstrap.min.js');
			AssetManager::addScript('admin::default/js/datatables/init.js');

			AssetManager::addStyle('admin::default/plugins/datatables/dataTables.bootstrap.css');
			AssetManager::addStyle('admin::default/plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css');

		}

		public function columnFilters($columnFilters = null)
		{
			if (is_null($columnFilters))
			{
				return $this->columnFilters;
			}
			$this->columnFilters = $columnFilters;
			return $this;
		}

		public function attributes($attributes = null)
		{
			if (is_null($attributes))
			{
				return $this->attributes;
			}
			$this->attributes = $attributes;
			return $this;
		}

		/**
		 * Set or get datatables order
		 * @param array|null $order
		 * @return $this|array
		 */
		public function order($order = null)
		{
			if (is_null($order))
			{
				return $this->order;
			}
			$this->order = $order;
			return $this;
		}

		public function export($button=null, $buttonAttributes = []) {

			$arrExtend = [
				'extend'	=> $button
			];

			$arrButton = array_merge($arrExtend, $buttonAttributes);

			$this->exportButtons[] = $arrButton;

			return $this;
		}

		protected function exportButtons() {
			return $this->exportButtons;
		}

		/**
		 * Get view render parameters
		 * @return array
		 */
		protected function getParams()
		{
			$params = parent::getParams();
			$params['order'] = $this->order();
			$params['columnFilters'] = $this->columnFilters();
			$params['attributes'] = $this->attributes();
			$params['exportButtons']	= $this->exportButtons();
			return $params;
		}

	}

### Usage in model configuration

	…->display(function ()
	{
	    $display = AdminDisplay::customdatatables();
	    // configure display
	    return $display;
	})