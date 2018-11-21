
<!DOCTYPE html><html lang="en">
<head>
    <title>title</title>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>
<body>


@include('Header')


@yield('content')


@include('Footer')


</body>
</html>