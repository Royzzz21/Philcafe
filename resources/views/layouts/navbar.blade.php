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
                                                {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                                   {{--onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                                                    {{--{{ __('Logout') }}--}}
                                                {{--</a>--}}
                                                {{--<p class="dropdown-item">--}}
                                                    {{--(Under Maintenance)--}}
                                                {{--</p>--}}
                                                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
                                                      {{--style="display: none;">--}}
                                                    {{--@csrf--}}
                                                {{--</form>--}}
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


{{-- <br><br><br><br>
<br><br><br><br>
<br><br><br><br> --}}