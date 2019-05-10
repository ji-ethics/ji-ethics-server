@extends('admin.Header')

@section('content')
<h2>{{$user->first_name}} {{$user->last_name}}'s answers</h2>
<br>
<h3>Answer for chapter questions</h3>

<table>
	<tr>
		<th>Chapter number</th>
		<th>Question description</th>
		<th>Answer</th>
	</tr>
	@foreach($section_question_answers as $answer)
		<tr>    
	      <th>{{$answer->chapter_id}}</th>
	      <th>{{$answer->detail}}</th>
	      <th>{{$answer->answer}}</th>
	    </tr>
	@endforeach

@endsection('content')