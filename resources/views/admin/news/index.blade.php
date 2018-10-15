@extends('layouts.admin')

@section('content')

<h3 class="page_title">News</h3>

<a href="{{ route('news.add_news') }}" class="btn btn-success">Add new </a>

<br>




<div class="col-sm-12">
    <div class="row">
        <table class="table table-bordered table-striped datatable dt-select dataTable no-footer">
            <thead>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Status</th>
                <th>Date Created</th>
            </thead>

            @foreach ($news as $news)
                <tr>
                    <th>{{ str_limit($news->title, 70) }}</th>
                    <th>{!! str_limit($news->content, 200) !!}</th>
                    <th><img src="{{ asset('upload/news/'.$news->image) }}" alt="" width="150px" height="75px"></th>
                    <th class="text-center">{{ $news->status }}</th>
                    <th class="text-center" width="100px">
                        <a href="" class="btn btn-xs btn-primary">view</a>
                        <a href="{{ route('news.update', ['id' => $news->id]) }}" class="btn btn-xs btn-info">edit</a>
                        <a href="" class="btn btn-xs btn-danger">delete</a>
                    </th>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<style>

    th.text-center {
        width: 116px;
    }

</style>

@endsection