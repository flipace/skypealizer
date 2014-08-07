@extends('layout')

@section('content')
	<a href="{{ route('home') }}">go to home</a>
	<h1>Database</h1>
	<h2>{{$db->name}}</h2>
	<h3>Conversation "{{$conversation->displayname}}"</h3>

	<a href="{{ route('db.conversation.words', array('db' => $db->id, 'conversation' => $conversation->id)) }}">analyze</a>

	<table>
		<thead>
		@foreach($columns as $column)
			<th>{{$column}}</th>
		@endforeach
		</thead>
		<tbody>
		@foreach($messages as $message)
		<tr>
			@foreach($message as $key => $col)
				@if(in_array($key, $columns))
				<td>{{$col}}</td>
				@endif
			@endforeach
		</tr>
		@endforeach
		</tbody>
	</table>
@stop