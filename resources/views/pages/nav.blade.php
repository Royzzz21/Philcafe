@extends('layouts.app')

@section('content')

@foreach ($navs as $navs)
    <a href="{{ 'navigation_content/'.$navs->url }}">{{ $navs->name }}</a> <br>
@endforeach
sds
