@extends('layouts.app')

@section('content')

    <!--Main section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1>Edit Post</h1>
                {!! Form::open(['action' => ['PostsController@update', $posts->document_srl],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    <input name="category" type="hidden" value="{{$posts->module_srl}}">
                    <input name="url" type="hidden" value="{{$nav_url}}">
                    {{Form::text('title', $posts->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group ">
                        {{Form::label('body', 'Body')}}
                        {{Form::textarea('body', $posts->content, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                </div>
                <div class="form-group">
                    <input type="hidden" name="file">
                </div>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a href="{{ route('delete', ['id' => $posts->document_srl ]) }}" class="btn btn-danger">Delete</a>

                {{-- <a href="/content/{{$url}}" class="btn btn-secondary float-right">Cancel</a> --}}
                {!! Form::close() !!}

                <hr>
            </div>
        </div>
    </div>

    <hr>


@endsection
