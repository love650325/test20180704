@extends('layouts.app')
@section('content')

<form action="{{ url('todo') }}" method="POST">
	@csrf
	<input type="text" placeholder="name" name='title'>
	<input type="submit">
</form>

@foreach ($todos as $todo)
	<p>
		
		{{ $todo->id .'.'. $todo->title }}
		<form action="todo/{{ $todo->id }}" method="POST">
			@csrf
			{{ method_field('DELETE') }}
		<input type="submit" value="Delete">
		</form>
	</p>
@endforeach

@endsection