<?php

class SkypeDb extends Eloquent{
	protected $table = 'skype_db';
	protected $database = null;

	protected function getDatabase()
	{
		if(is_null($this->database)){
			$file = public_path().'/uploads/'.$this->name;
			$db_connection = array(
				'driver'   => 'sqlite',
				'database' => $file
			);

			Config::set('database.connections.skype', $db_connection);

			$this->database = DB::connection('skype');
		}
	}

	public function init()
	{
		$this->getDatabase();
	}

	public function getTables()
	{
		$this->getDatabase();

		return $this->database->select('select name, tbl_name from sqlite_master group by tbl_name order by tbl_name asc');
	}

	public function count($table)
	{
		$this->getDatabase();

		return $this->database->select('select count(*) c from '.$table)[0]->c;
	}

	public function columns($table)
	{
		$this->getDatabase();

		$classname = 'Skype_'.$table;
		
		if(class_exists($classname)){
			$table_class = new $classname;
			return $table_class->columns();
		}

		return $this->database->getSchemaBuilder()->getColumnListing($table);
	}

	public function rows($table)
	{
		$this->getDatabase();

		$classname = 'Skype_'.$table;

		if(class_exists($classname)){
			$table_class = new $classname;
			return $table_class->allDyn()->toArray();
		}

		return $this->database->select('select * from '.$table);
	}
}