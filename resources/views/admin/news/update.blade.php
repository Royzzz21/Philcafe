@extends('layouts.admin')

@section('content')
<h3 class="page_title">Update News</h3>


<div class="col-sm-8 col-sm-offset-2 news_title">
    <div class="title">
        <h4>Create a news</h4>
    </div>
</div>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        {{ Form::open(['action'=> 'Admin\NewsController@store_update', 'files'=> true, 'method'=>'POST', 'enctype'=> 'multipart/form-data" ']) }}
        <input type="hidden" value="{{ $news->id }}" name="id">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" value="{{ isset($news->title)? $news->title : ''  }}" name="title">
            </div><!-- Title -->

            <textarea class="form-control" id="summary-ckeditor" name="content">{{ isset($news->content)? $news->content : '' }}</textarea>
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
        <div class="col-sm-12">
            
            
            <div class="image-container mb-2"> 
                <a href="" id="update-image"> <span class="glyphicon glyphicon-remove-circle text-danger" style="margin-left: 17px;"></span></a><br>
                <img src="{{ asset('upload/news/'.$news->image) }}"  class="ml-2 pl-1" width="50" height="50">
            </div>
        </div>

        {{ Form::close() }}5
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