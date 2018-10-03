@extends('layouts.app')

@section('content')

    <!--Main section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1>Create Post</h1>

                {!! Form::open(['action' => 'PostsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    <input name="category" type="hidden" value="{{ $nav_id }}">
                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                </div>
                <div class="form-group">
                    {{Form::file('cover_image')}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a href="/dashboard" class="btn btn-secondary float-right">Cancel</a>
                {!! Form::close() !!}
                <hr>
            </div>



        </div>
    </div>

    <hr>



@endsection
