<div class="row">
    <div class="col-sm-12">
        <div class="row" id="row-nav">
           
            <div class="col-sm-12 mt-3">
                <div class="row align-items-center">
                    <div class="col-sm-4 text-right">
                        <a href="/"><img src="{{asset('images/logorotate.gif')}}" alt="" class="img-logo"></a>
                    </div><!-- Logo -->

                    <div class="col-sm-4 px-0">
                        <div class="input-group pr-3" id="search">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Username"
                            aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- Search -->

                    <div class="col-sm-4 text-left">
                        @if(Auth::check())
                            <nav class="nav-item dropdown">
                                <img src="{{ asset('images/profile_pictures/'. Auth::user()->photo) }}" id="profile-picture" width="50px" height="50px">
                                <a class="nav-link dropdown-toggle d-inline-block" href="#" id="link-dropdown" role="button" data-toggle="dropdown"> {{Auth::user()->name}} </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{route('profile')}}" class="dropdown-item">Profile</a>
                                    {{--<a href="#logout" onclick="$('#logout').submit();" class="dropdown-item"> <span class="title">@lang('quickadmin.qa_logout')</span> </a>--}}
                                    {{--{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}--}}
                                        {{--<button type="submit">@lang('quickadmin.logout')</button>--}}
                                    {{--{!! Form::close() !!}--}}
                                    <a href="{{ url('/logout') }}" class="dropdown-item">Logout</a>
                                </div>
                            </nav>
                        @else
                            <div class="login-register">
                                <a href="/login" class="first_nav  d-inline">Login</a> 
                                    <div class="separator d-inline-block">|</div>
                                <a href="/register" class="first_nav  d-inline">Register</a>
                            </div>
                        @endif <!-- if not logged in -->
                    </div><!-- Login Area -->
                </div>
            </div><!-- col-md-12-->

            <div class="container">
                <div class="col-sm-12">
                    <nav class="nav nav-pills nav-fill">
                        @foreach ($navs as $nav)
                            <a class="nav-item nav-link new"
                               href="{{ action('PagesController@content').'/'.$nav->url }}">
                            <span class="sub-name">
                            @if ($nav->name == '사전준비')
                                    {{ $nav->name }} <br> Preparation

                                @elseif($nav->name == '일반/생활')
                                    {{ $nav->name }} <br> General/Life

                                @elseif($nav->name == '이민/사업')
                                    {{ $nav->name }} <br> Imigration/Bz

                                @elseif($nav->name == '창업')
                                    {{ $nav->name }} <br> Business

                                @elseif($nav->name == '부동산')
                                    {{ $nav->name }} <br> Real Estate

                                @elseif($nav->name == '비자')
                                    {{ $nav->name }} <br> Visa

                                @elseif($nav->name == '어학연수')
                                    {{ $nav->name }} <br> language

                                @elseif($nav->name == '조기유학')
                                    {{ $nav->name }} <br> Study

                                @elseif($nav->name == '대학')
                                    {{ $nav->name }} <br> College

                                @elseif($nav->name == '여행')
                                    {{ $nav->name }} <br> Travel

                                @elseif($nav->name == '바로알기')
                                    {{ $nav->name }} <br> Phillippines
                                @endif
                            </span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </div>
    


<style>

/* NEW STYLE OF NAVIGATION */
    div#search {
        height: 45px;
    }

    img.img-logo {
        height: 64px;
    }

    img.img-logo {
        width: 192px;
    }

    img#profile-picture {
        border-radius: 50%;
    }

    a#link-dropdown {
        color: #000;
    }
    a#link-dropdown:hover {
        color: #F5CC00;
    }

    a.first_nav.d-inline {
        color: #000;
    }

    a.first_nav.d-inline:hover {
        color: #F5CC00;
    }

    .separator.d-inline-block {
        font-weight: 500;
        color: #eccd32;
    }
</style>

{{-- 
<div class="row">

    <div class="col-sm-12">
        <div class="row" id="row-nav">
            <div class="container">
                <div class="nav-login">
                    @if(Auth::check())
                        <ul class="navbar-nav right-nav ml-auto" id="navbarCollapse">
                            <div class="col-sm-12">
                                <div class="row">

                                    <div class="col-sm-12 text-right">
                                        <li class="nav-item dropdown">
                                            <img src="{{ asset('images/profile_pictures/'. Auth::user()->photo) }}" alt="" width="50px" height="50px">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                               role="button" data-toggle="dropdown"> {{Auth::user()->name}} </a>
                                            <div class="dropdown-menu dropdown-menu-left"
                                                 aria-labelledby="navbarDropdown">
                                                <a href="{{route('profile')}}" class="dropdown-item">Profile</a>
                                                    <a href="#logout" onclick="$('#logout').submit();" class="dropdown-item">

                                                        <span class="title">@lang('quickadmin.qa_logout')</span>
                                                    </a>

                                                {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
                                                <button type="submit">@lang('quickadmin.logout')</button>
                                                {!! Form::close() !!}

                                            </div>
                                        </li> <!-- User name section -->
                                    </div>
                                </div>
                            </div>
                        </ul>
                    @else
                        <a href="/login" class="first_nav">Login</a>
                        <a href="/register" class="first_nav">Register</a>
                    @endif
                </div>
            </div>

            <div class="col-sm-12 text-center px-0">
                <a href="/"><img src="{{asset('images/logorotate.gif')}}" alt="" class="img-logo"></a>
            </div>
            <div class="col-sm-12 px-0">
                <div class="col-sm-6 offset-sm-3">
                    <div class="input-group" id="search">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Username"
                               aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="col-sm-12">
                    <nav class="nav nav-pills nav-fill">
                        @foreach ($navs as $nav)
                            <a class="nav-item nav-link new"
                               href="{{ action('PagesController@content').'/'.$nav->url }}">
                            <span class="sub-name">
                            @if ($nav->name == '사전준비')
                                    {{ $nav->name }} <br> Preparation

                                @elseif($nav->name == '일반/생활')
                                    {{ $nav->name }} <br> General/Life

                                @elseif($nav->name == '이민/사업')
                                    {{ $nav->name }} <br> Imigration/Bz

                                @elseif($nav->name == '창업')
                                    {{ $nav->name }} <br> Business

                                @elseif($nav->name == '부동산')
                                    {{ $nav->name }} <br> Real Estate

                                @elseif($nav->name == '비자')
                                    {{ $nav->name }} <br> Visa

                                @elseif($nav->name == '어학연수')
                                    {{ $nav->name }} <br> language

                                @elseif($nav->name == '조기유학')
                                    {{ $nav->name }} <br> Study

                                @elseif($nav->name == '대학')
                                    {{ $nav->name }} <br> College

                                @elseif($nav->name == '여행')
                                    {{ $nav->name }} <br> Travel

                                @elseif($nav->name == '바로알기')
                                    {{ $nav->name }} <br> Phillippines
                                @endif
                            </span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </div>
 --}}

{{-- <br><br><br><br>
<br><br><br><br>
<br><br><br><br> --}}
