@extends('layout')

@section('content')
	<a href="{{ route('home') }}">go to home</a>
	<h1>Database</h1>
	<h2>{{$db->name}}</h2>
	<h3>{{$table}}</h3>
	<pre>
	<table>
		<thead>
		@foreach($columns as $column)
			<th>{{$column}}</th>
		@endforeach
		</thead>
		<tbody>
		@foreach($rows as $row)
			<tr>
			@foreach($row as $key=>$col)
			<td><?php 
			switch($table){
				case 'Conversations':
					echo '<a href="'.route('db.conversation.messages', array('db' => $db->id, 'conversation' => $row['id'])).'">';
					break;
			}
			?>{{ strpos($key, 'timestamp') > -1 ? date('d.m.Y H:i:s', $col) : $col}}<?php
			switch($table){
				case 'Conversations':
					echo '</a>';
					break;
			}
			?></td>
			@endforeach
			
			</tr>
		@endforeach
		</tbody>
@stop