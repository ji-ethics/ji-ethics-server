@extends('admin.Header')
@section('content')
	<h1>Show by users</h1>

	<form method="POST" action="/showResult/by_user">
		{{ csrf_field() }}
		<p>Select the semester:</p>
		<div>
			<select name = "semester">
				@foreach ($semesters as $semester)
				<option value = "{{$semester}}">{{$semester}}</option>
				@endforeach
				
			</select>
		</div>
		<br>

		<p>Select the section:</p>
		<div>
			<select name = "section">
				@foreach ($section_numbers as $section)
				<option value = "{{$section}}">{{$section}}</option>
				@endforeach
			</select>
		</div>

		<br>
		<div>
			<button type="submit">Get the students</button>

		</div>
		
		<br>
	</form>
@endsection('content')