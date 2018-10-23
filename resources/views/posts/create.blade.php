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

                    <input name="category" type="hidden" value="{{$nav_id}}">
                    <input name="url" type="hidden" value="{{$url}}">

                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                </div>

                <div class="col-sm-6 px-0">
                        <input type="file" id="file" name="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" >

                        @if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo $errors->first('file') == 'validation.uploaded'? 'The file may not be greater than 1024 kilobytes.' : $errors->first('file') ?></strong>
                            </span>
                        @endif

                        @if(session('file_error'))
                           <span class="" style=" font-size: 12px; font-weight: 700; color: #dc3545;">
                               <strong> {{ session('file_error') }}</strong>
                           </span>
                        @endif
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
