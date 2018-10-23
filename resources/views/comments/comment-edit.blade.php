@extends('layouts.app')

@section('content')
    <!--Main section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1>Edit Post</h1>
                {!! Form::open(['action' => ['CommentsController@update', $comment->comment_srl],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{csrf_field()}}
                </div>
                <div class="form-group ">
                    <input type="hidden" name="file">
                    <input type="hidden" name="nick_name" value="{{Auth::user()->name }}">
                    <input type="hidden" name="user_name" value="{{ Auth::user()->username }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="email_address" value="{{ Auth::user()->email }}">
                    {{Form::label('body', 'Body')}}
                    {{Form::textarea('body', $comment->content, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                </div>
                <div class="form-group">
                    <input type="hidden" name="file">
                </div>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

                {{-- <a href="/content/{{$url}}" class="btn btn-secondary float-right">Cancel</a> --}}
                {!! Form::close() !!}

                <hr>
            </div>
        </div>
    </div>
    <hr>
@endsection
