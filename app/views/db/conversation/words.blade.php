@extends('layout')

@section('content')
	<a href="{{ route('home') }}">go to home</a>
	<h1>Database</h1>
	<h2>{{$db->name}}</h2>
	<h3>Conversation "{{$conversation->displayname}}"</h3>

	<a href="{{ route('db.conversation.messages', array('db' => $db->id, 'conversation' => $conversation->id)) }}">messages</a>
	<br />
	<table>
		<thead>
			<th>Count</th>
			<th>Author</th>
		</thead>
		<tbody>
		@foreach($words['authors'] as $author => $count)
		<tr>
			<td>{{$count}}</td>
			<td>{{$author}}</td>
		</tr>
		@endforeach
		</tbody>
	</table>
	<br />
	<table>
		<thead>
			<th>Count</th>
			<th>Wort</th>
		</thead>
		<tbody>
		@foreach($words['allWords'] as $word)
		<tr>
			<td>{{$word['count']}}</td>
			<td>{{$word['word']}}</td>
		</tr>
		@endforeach
		</tbody>
	</table>
@stop