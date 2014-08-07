@extends('layout')

@section('content')
	<h1>Upload new db</h1>
	{{ Form::open(array('route' => 'db.upload', 'files' => true)) }}
		{{ Form::label('db', 'Skype Database File') }}
		{{ Form::file('db') }}
		{{ Form::submit('Import') }}
	{{ Form::close() }}

	<h2>Existing dbs</h2>
	<table>
		@foreach($dbs as $db)
		<tr>
			<td>{{$db->id}}</td>
			<td>{{$db->name}}</td>
			<td><a href="{{ route('db.view', array('db' => $db->id)) }}">view</a></td>
			<td><a href="{{ route('db.delete', array('db' => $db->id)) }}" data-method="delete">delete</a></td>
		</tr>
		@endforeach
	</table>

@stop