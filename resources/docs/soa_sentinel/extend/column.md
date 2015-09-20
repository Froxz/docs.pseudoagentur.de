#Register new Column

You can register your own class as column in `bootstrap.php` file within `bootstrapDirectory` (default is `app/admin/bootstrap.php`).

	Column::register('yesNo', Column\YesNoColumn::class)

Your column class must extend `SleepingOwl\Admin\Columns\Column\BaseColumn` (if you dont want to get value from instance by name) or `SleepingOwl\Admin\Columns\Column\NamedColumn` (in opposite case).

## Example 

File: `app/admin/bootstrap.php`

	Column::register('yesNo', App\Column\YesNoColumn::class)

File: `app/Column/YesNoColumn.php`

	<?php namespace App\Column

	class YesNoColumn extends SleepingOwl\Admin\Columns\Column\NamedColumn
	{

	    public function render()
	    {
	        $params = [
	            'value'  => $this->getValue($this->instance, $this->name()),
	        ];
	        return view('my-view', $params);
	    }

	}

### Usage in model configuration

	$display->columns([
	    Column::yesNo(),
	]);