@extends('admin.Header')
@section('content')

<div class="padding">

    <div><h1>Data Analysis</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <img src="{{ asset('image\data1.png') }}" />
            <br/>
            <br/>
            <br/>
            <img src="{{ asset('image\dataanalysis.jpg') }}" />

        </div>

    </div>


    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
@endsection