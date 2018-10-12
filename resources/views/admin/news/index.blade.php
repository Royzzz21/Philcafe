@extends('layouts.admin')

@section('content')

<h3 class="page_title">News</h3>

<a href="{{ route('news.add_news') }}" class="btn btn-success">Add new </a>

@endsection