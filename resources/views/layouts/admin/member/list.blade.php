@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>PatoCO.</h1>
                        <span class="subheading">Thanks for visiting local.pato.net</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
            @if(count($user)> 0)
                @foreach($user as $user )

                        <div class="row">

                            <div class="col-lg-8 col-md-10">
                                <div class="post-preview">
                                    <p class="post-meta">Written by
                                        <a href="#">{{$user->user->name}}</a>
                                    </p>
                                </div>

                                <hr>

                            </div>
                        </div>
                <hr>

                @endforeach
                    </div>
                        <div class="row justify-content-center">
                            {{$user->links()}}
                    </div>
                     @else
                         <p>No posts found</p>
             @endif
@endsection
