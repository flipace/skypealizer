<?php

class Skype_Base extends Eloquent{
	protected $connection = 'skype';

	protected $show_columns = null;

	public function columns()
	{
		if(!is_null($this->show_columns)){
			return $this->show_columns;
		}else{
			return DB::connection($this->connection)->getSchemaBuilder()->getColumnListing($this->table);
		}
	}

	public function allDyn($columns = array())
	{
		if(!is_null($this->show_columns)){
			return parent::all(array_merge($columns, $this->show_columns));
		}
		return parent::all($columns);
	}
}