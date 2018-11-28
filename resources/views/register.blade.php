<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('\css\bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\mycss.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

@include('Header1')

<div class = "row">
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    <div class="col-xs-10 col-sm-10 col-md-8" style="margin:2%;">
        <h2 class="text-center">   Registration    </h2>
        {{ Form::open(array('class'=>'form-signup')) }}
        {{--<ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>--}}
        <fieldset>
            <p class="form-group">
                {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
            </p>
            <p class="form-group">
                {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
            </p>
            <p class="form-group">
                {{ Form::text('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
            </p>
            <p class="form-group">
                {{ Form::text('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Password Again')) }}
            </p>
            {{ Form::submit('马上注册',array('class'=>'btn btn-large btn-success btn-block')) }}
        </fieldset>
        {{ Form::close() }}

{{--
        <div>
            <h4> You can also register with</h4>
            <img src="image/qq.png" height="30" width="30" class="img-circle"/>
            <img src="image/weixin.png" height="30" width="30" class="img-circle"/>
            <img src="image/weibo.png" height="30" width="30" class="img-circle"/>
            <img src="image/FaceBook.png" height="30" width="30" class="img-rounded"/>
        </div>
--}}
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>

</div>
<div align="center">
    <a href=register/agreement><button type="submit" class="btn btn-default" > Next </button></a>
</div>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


@include('Footer')


</body>
