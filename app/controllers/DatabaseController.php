<?php

class DatabaseController extends BaseController {

	public function view($db)
	{
		$db = SkypeDb::find($db);

		return View::make('db.view')
			->with('db', $db)
			->with('tables', $db->getTables());
	}

	public function upload()
	{
		if (Input::hasFile('db'))
		{
			$file = Input::file('db');

		    if($file->getClientOriginalExtension() == 'db'){
		    	$name = uniqid().'.db';

		    	$file->move('uploads',$name);

		    	$db = new SkypeDb;
		    	$db->name = $name;
		    	$db->save();

		    	return Redirect::route('db.view', array('db' => $db->id));
		    }
		}
	}

	public function delete($db)
	{
		SkypeDb::destroy($db);
		return Redirect::route('home');
	}

	/** Specifics **/

	public function table($db, $table)
	{
		$db = SkypeDb::find($db);

		return View::make('db.table')
			->with('db', $db)
			->with('table', $table)
			->with('columns', $db->columns($table))
			->with('count', $db->count($table))
			->with('rows', $db->rows($table));
	}
}
