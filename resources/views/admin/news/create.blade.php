@extends('layouts.admin')

@section('content')
<h3 class="page_title">News</h3>


<div class="col-sm-8 col-sm-offset-2 news_title">
    <div class="title">
        <h4>Create a news</h4>
    </div>
</div>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        {{ Form::open(['action'=> 'Admin\NewsController@store', 'files'=> true, 'method'=>'POST', 'enctype'=> 'multipart/form-data" ']) }}
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
            </div><!-- Title -->

            <textarea class="form-control" id="summary-ckeditor" name="content"></textarea>
            <!-- TeXT AREA -->
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <input type="file" name="file" class="ck-btn">
                </div><!-- FILE-->
                <div class="col-sm-6">
                    <input type="submit" class="pull-right btn btn-primary ck-btn" value="Submit">
                </div><!-- SUBMIT -->
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

{{-- sd --}}
<style>

    .col-sm-8.col-sm-offset-2.news_title {
        background-color: #f7f7f7;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    h4 {
        margin-top: 14px;
    }
    .title {
        margin-top: 10px;
    }
    .col-sm-8.col-sm-offset-2.news_title {
        height: 50px;
    }
    .col-sm-8.col-sm-offset-2 {
        padding: 0  30px 30px 30px;
        background: #ffffff;
        border: 1px solid gainsboro;
    }

    .ck-btn{
        margin-top: 15px;
    }

    form {
        padding-top: 20px;
    }

</style>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace( 'summary-ckeditor' ); </script>

@endsection