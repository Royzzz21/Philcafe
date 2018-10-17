@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <section>
        <div class="container">
            <!-- First Row -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>
            <div class="row">
                {{-- POST SUBJECT FULL DETAILS --}}
                <div class="container">
                    <div class="row" id="thread-container">
                        <div class="col-sm-4 col-md-3 col-xl-2" id="first-row">
                            <div class="row">
                                <div class="col-6 col-sm-12 text-center">
                                    <img src="{{ asset('images/login3.png') }}" id="user-img-thread"
                                         class="img-fluid" alt="user-img-thread">
                                </div>
                                <div class="col-6 pt-4 d-sm-none">
                                    <b><p class=" p-0" id="thread-username">Username</p></b>
                                    <p class=" my-0" id="thread-title">Honorary Poster</p>
                                    <p class="" id="established">Established</p>
                                </div>

                            </div><!-- First row top image section -->
                            <div class="row ">
                                <div class="col-sm-12 d-none d-sm-block">
                                    <b><p class="text-center p-0" id="thread-username">Username</p></b>
                                    <p class="text-center my-0" id="thread-title">Honorary Poster</p>
                                    <p class="text-center" id="established">Established</p>
                                </div>
                            </div><!-- First row top text section -->
                        </div><!-- First row -->
                        <div class="col-sm-8 col-md-9 col-xl-10" id="main-content">
                            {{-- <div class="px-3 pt-3"> --}}
                            <div class="row col-sm-12 p-0 mr-0" id="thread-main-content">
                                <p class="content-text px-2">
                                    ipsantium, officia numquam hic repellat repellendus tempore dicta! Rem,
                                    laborum aut atque nulla ratione mollitia maxime.
                                    ipsantium, officia numquam hic repellat repellendus tempore dicta! Rem,
                                    laborum aut atque nulla ratione mollitia maxime.
                                </p>
                            </div> <!-- thread-main-content -->
                            <div class="row" id="thread-bottom-row">
                                <div class="col-sm-12 fixed-bottom position-static px-4">
                                    <div class="row thread-bottom-row top">
                                        <div class="col-sm-8">
                                            <a href=""> <i class="fab fa-twitter-square fa-lg"></i> </a>
                                            <a href=""> <i class="fab fa-facebook fa-lg"></i> </a>
                                            <a href=""> <i class="fas fa-envelope-square  fa-lg"></i> </i> </a>
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <a href=""> <i class="far fa-thumbs-down mr-1"><span
                                                            class="badge reaction-count">0</span></i> </a>
                                            <a href=""> <i class="far fa-thumbs-up"><span
                                                            class="badge reaction-count">0</span></i> </a>
                                        </div>
                                    </div><!-- bottom-first-row -->
                                    <hr id="thread-hr">
                                    <div class="row thread-bottom-row bottom">
                                        <div class="col-sm-6">
                                            <p class="text-left" id="reply">Saturday at 4:38 PM</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#"><p class="text-right" id="reply">Reply</p></a>
                                        </div>
                                    </div><!-- bottom-second-row -->
                                </div>
                            </div><!-- thread-bottom-row -->
                        </div><!-- add 3 units padding -->
                    </div><!-- Second row -->
                </div><!-- Main row -->
            </div><!-- main container -->
        </div>
        <div class="row">
            <div class="container">
                <div class="row" id="thread-container">
                    <div class="col-sm-4 col-md-3 col-xl-2" id="first-row">
                        <div class="row">
                            <div class="col-6 col-sm-12 text-center">
                                <img src="{{ asset('images/login3.png') }}" id="user-img-thread"
                                     class="img-fluid" alt="user-img-thread">
                            </div>
                            <div class="col-6 pt-4 d-sm-none">
                                <b><p class=" p-0" id="thread-username">Username</p></b>
                                <p class=" my-0" id="thread-title">Honorary Poster</p>
                                <p class="" id="established">Established</p>
                            </div>

                        </div><!-- First row top image section -->
                        <div class="row ">
                            <div class="col-sm-12 d-none d-sm-block">
                                <b><p class="text-center p-0" id="thread-username">Username</p></b>
                                <p class="text-center my-0" id="thread-title">Honorary Poster</p>
                                <p class="text-center" id="established">Established</p>
                            </div>
                        </div><!-- First row top text section -->
                    </div><!-- First row -->
                    <div class="col-sm-8 col-md-9 col-xl-10" id="main-content">
                        {{-- <div class="px-3 pt-3"> --}}
                        <div class="row col-sm-12 p-0 mr-0" id="thread-main-content">
                            <p class="content-text px-2">
                                ipsantium, officia numquam hic repellat repellendus tempore dicta! Rem,
                                laborum aut atque nulla ratione mollitia maxime.
                                ipsantium, officia numquam hic repellat repellendus tempore dicta! Rem,
                                laborum aut atque nulla ratione mollitia maxime.
                            </p>
                        </div> <!-- thread-main-content -->
                        <div class="row" id="thread-bottom-row">
                            <div class="col-sm-12 fixed-bottom position-static px-4">
                                <div class="row thread-bottom-row top">
                                    <div class="col-sm-8">
                                        <a href=""> <i class="fab fa-twitter-square fa-lg"></i> </a>
                                        <a href=""> <i class="fab fa-facebook fa-lg"></i> </a>
                                        <a href=""> <i class="fas fa-envelope-square  fa-lg"></i> </i> </a>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <a href=""> <i class="far fa-thumbs-down mr-1"><span
                                                        class="badge reaction-count">0</span></i> </a>
                                        <a href=""> <i class="far fa-thumbs-up"><span
                                                        class="badge reaction-count">0</span></i> </a>
                                    </div>
                                </div><!-- bottom-first-row -->
                                <hr id="thread-hr">
                                <div class="row thread-bottom-row bottom">
                                    <div class="col-sm-6">
                                        <p class="text-left" id="reply">Saturday at 4:38 PM</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#"><p class="text-right" id="reply">Reply</p></a>
                                    </div>
                                </div><!-- bottom-second-row -->
                            </div>
                        </div><!-- thread-bottom-row -->
                    </div><!-- add 3 units padding -->
                </div><!-- Second row -->
            </div><!-- Main row -->
        </div><!-- main container -->
        </div>
        </div>
    </section>
@endsection


