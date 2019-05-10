<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
	@foreach($userList as $user)
		<tr>    
	      <th><a href="/showResult/{{$user->id}}">{{$user->id}} </a></th>
	      <th>{{$user->first_name}}</th>
	      <th>{{$user->last_name}}</th>
	    </tr>
	    
	@endforeach
	</table>
</body>
</html>