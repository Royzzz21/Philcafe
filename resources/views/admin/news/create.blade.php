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
        <form action="" >
            <div class="col-sm-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="email" class="form-control" id="title" placeholder="Title" name="title">
                    </div>
        
                    <textarea class="form-control" id="summary-ckeditor" name="content"></textarea>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="file" name="file" class="ck-btn">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" class="pull-right btn btn-primary ck-btn" value="Submit">
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>

{{-- sd --}}
<style>
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