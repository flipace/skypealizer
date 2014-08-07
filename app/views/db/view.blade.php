@extends('layout')

@section('content')
	<a href="{{ route('home') }}">go to home</a>
	<h1>Database</h1>
	<h2>{{$db->name}}</h2>

	<h3>Tables</h3>
	@foreach($tables as $table)
	<a href="{{ route('db.table', array('db' => $db->id, 'table' => $table->tbl_name)) }}">{{$table->tbl_name}}</a><br />
	@endforeach
@stop