@extends('admin.Header')
@section('content')

<div class="padding">

    <div><h1>Material</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

            <input name="_tabken" value="{{csrf_token()}}" type="hidden">
            <form action="/material_add" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Chapter ID</label>
                    <input name="chapter_id" type="text" class="form-control" placeholder="Chapter ID">
                </div>
                <div class="form-group">
                    <label>Section ID</label>
                    <input name="section" type="text" class="form-control" placeholder="Section ID">
                </div>
                <div class="form-group">
                    <label>Section title</label>
                    <input name="sectiontitle" type="text" class="form-control" placeholder="Section Title">
                </div>

                <div class="form-group">
                    <label>Section Detail</label>
                    <textarea name="sectiondetail"  id="content" style="height:400px;max-height:500px;" type="text" class="form-control" placeholder="section_detail">
                        Add New material
                    </textarea>
                </div>


                <button type="submit" class="btn btn-default">Submit</button>

            </form>
            <br>
        </div>

    </div>


    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
@endsection