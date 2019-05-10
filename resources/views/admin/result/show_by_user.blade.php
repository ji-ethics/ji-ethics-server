@extends('admin.Header')
@section('content')
	<h2>Show by users from section {{$section}} in {{$semester}}</h2>
	
	<table>
		<th>Student ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		@foreach($users as $user)
			<tr>
		      <th><a href="/showResult/by_user/{{$user->id}}">{{$user->studentIDs}} </a></th>
		      <th>{{$user->first_name}}</th>
		      <th>{{$user->last_name}}</th>
		    </tr>
		    
		@endforeach
	</table>
@endsection('content')