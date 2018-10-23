@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mx-4">
        <div class="card-header">
            News
        </div>
        <div class="card-body">
            <div class="px-3">
                <h4 class="">{{ $news->title }}</h4>
                <div class="text-center mx-3">
                    <img src="{{ asset('upload/news/'. $news->image) }}" class="img-fluid mx-auto" alt="{{ $news->title }}">
                </div>
                <p class="card-text">{!! $news->content !!}</p>
            </div>
            <a href="{{ route('newspage') }}" class="btn btn-primary">Back</a>
        </div>
    </div><!-- CARD -->
</div>


<style>
    p {
        font-size: 13px;
    }
    .card-header {
        background-color: #c94941;
    }
</style>

@endsection