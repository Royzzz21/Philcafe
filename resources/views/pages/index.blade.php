@extends('layouts.app')
@inject('pages', 'App\Http\Controllers\PagesController')
@section('content')

    <!-- Page Header -->
    <section>
        <div class="container">
            <!-- First Row -->
            <div class="col-lg-12">
                <br>
                <div class="alert alert-warning" role="alert">
                    Welcome to Philcafe !
                    모든 디자인은 개발자에 의해 작동되고 있다. 후원해줘서 고마워요.
                </div>
            </div>
            `

            <!-- List Of Categories -->
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    {{-- NEWS --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="" id="news-title">News</span>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-6 col-sm-3">
                                    <img src="{{ asset('images/news.jpg') }}" class="mg-fluid card-img-top" alt="">
                                    <p class="news-img-caption">similique ex! (Under Maintenance)</p>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <img src="{{ asset('images/news.jpg') }}" class="mg-fluid card-img-top" alt="">
                                    <p class="news-img-caption">similique ex! Dolore atque enim consequatur!</p>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <img src="{{ asset('images/news.jpg') }}" class="mg-fluid card-img-top" alt="">
                                    <p class="news-img-caption">similique ex! Dolore atque enim consequatur!</p>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <img src="{{ asset('images/news.jpg') }}" class="mg-fluid card-img-top" alt="">
                                    <p class="news-img-caption">similique ex! Dolore atque enim consequatur!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Index -->
                    <div class="cat-content">
                        <div class="col-sm-12 body-data-header mt-3">
                            <div class="row">
                                <div class="col row align-items-center">
                                    <b>
                                        <p class="text-light m-0 my-2 pl-4">색인</p>
                                    </b>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light m-0 my-2 ">글 수</p>
                                    </b>
                                </div>
                                <div class="col-sm-5 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light m-0 my-2 ml-sm-3 ml-md-2">최신 게시물
                                        </p>
                                    </b>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-12 HEADER-->

                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(49)['0']->mid }}"
                                           class="header-text-column">
                                            공지사항 <span class="tags">HOT</span>
                                        </a>
                                    </p>
                                </div>

                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(49)}}</p>
                                </div>

                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block ">
                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(49)['0']->mid , 'document_srl' => $pages::getCategoryId(49)['0']->document_srl ]) }}"
                                       class="header-text-title">{{$pages::getCategoryId(49)['0']->title}} </a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(49)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(49)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(172)['0']->mid }}"
                                           class="header-text-column">
                                            자유게시판
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row ">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(172)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(172)['0']->mid , 'document_srl' => $pages::getCategoryId(172)['0']->document_srl ]) }}"
                                       class="header-text-title">{{$pages::getCategoryId(172)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(172)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(172)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(171)['0']->mid }}"
                                           class="header-text-column">
                                            질문/답변
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(171)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(171)['0']->mid , 'document_srl' => $pages::getCategoryId(171)['0']->document_srl ]) }}"
                                       class="header-text-title">{{$pages::getCategoryId(171)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(171)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(171)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-12 data one-->

                    </div>

                    <!-- Community -->
                    <div class="cat-content">
                        <div class="col-sm-12 body-data-header mt-3">
                            <div class="row">
                                <div class="col row align-items-center">
                                    <b>
                                        <p class="text-light m-0 my-2 pl-4">지역 사회</p>
                                    </b>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light m-0 my-2 ">게시물

                                        </p>
                                    </b>
                                </div>
                                <div class="col-sm-5 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light m-0 my-2 ml-sm-3 ml-md-2">최신 게시물</p>
                                    </b>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-12 HEADER-->

                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">

                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(180)['0']->mid }}"
                                           class="header-text-column">같이가기/모임/부탁 등
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(180)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(180)['0']->mid , 'document_srl' => $pages::getCategoryId(180)['0']->document_srl ]) }}"
                                       class="header-text-title">{{$pages::getCategoryId(180)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(180)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(180)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(176)['0']->mid }}"
                                           class="header-text-column">코필커플/국제결혼</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row ">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(176)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(176)['0']->mid , 'document_srl' => $pages::getCategoryId(176)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(176)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2">{{$pages::getCategoryId(176)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(176)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(184)['0']->mid }}"
                                           class="header-text-column">먹/놀/볼거리</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(184)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(184)['0']->mid , 'document_srl' => $pages::getCategoryId(184)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(184)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2">{{$pages::getCategoryId(184)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(184)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(173)['0']->mid }}"
                                           class="header-text-column">경험/여행/정보</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(173)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(173)['0']->mid , 'document_srl' => $pages::getCategoryId(173)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(173)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2">{{$pages::getCategoryId(173)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(173)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-12 data one-->
                    </div>

                    <!-- News -->
                    <div class="cat-content">
                        <div class="col-sm-12 body-data-header mt-3">
                            <div class="row">
                                <div class="col row align-items-center">
                                    <b>
                                        <p class="text-light m-0 my-2 pl-4">뉴스</p>
                                    </b>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light m-0 my-2 ">게시물</p>
                                    </b>
                                </div>
                                <div class="col-sm-5 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light m-0 my-2 ml-sm-3 ml-md-2">최신 게시물</p>
                                    </b>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-12 HEADER-->

                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(181)['0']->mid }}"
                                           class="header-text-column">필리핀 뉴스</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(181)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(181)['0']->mid , 'document_srl' => $pages::getCategoryId(181)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(181)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(181)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(181)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(183)['0']->mid }}"
                                           class="header-text-column">사업뉴스</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row ">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(183)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(183)['0']->mid , 'document_srl' => $pages::getCategoryId(183)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(183)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(183)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(183)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(163)['0']->mid }}"
                                           class="header-text-column">창업</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(163)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                    <a href="#"
                                       class="header-text-title"> {{$pages::getCategoryId(163)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(163)['0']->mid , 'document_srl' => $pages::getCategoryId(163)['0']->document_srl ]) }}"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(163)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(163)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-12 data one-->
                    </div>

                    <!-- Living -->
                    <div class="cat-content">
                        <!-- Title Column -->
                        <div class="col-sm-12 body-data-header mt-3">
                            <div class="row">
                                <div class="col row align-items-center">
                                    <b>
                                        <p class="text-light m-0 my-2 pl-4">생활</p>
                                    </b>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light m-0 my-2 ">게시물</p>
                                    </b>
                                </div>
                                <div class="col-sm-5 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light m-0 my-2 ml-sm-3 ml-md-2">최신 게시물</p>
                                    </b>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-12 HEADER-->
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(180)['0']->mid }}"
                                           class="header-text-column">필리핀 같이가기/여행/모임/번개/친구만들기/사람찾기 등등</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row ">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(180)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(180)['0']->mid , 'document_srl' => $pages::getCategoryId(180)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(180)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(180)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(180)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(164)['0']->mid }}"
                                           class="header-text-column">부동산</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(164)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(164)['0']->mid , 'document_srl' => $pages::getCategoryId(164)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(164)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(164)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(164)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(187)['0']->mid }}"
                                           class="header-text-column">필리핀어 (따갈로그)</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(187)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(187)['0']->mid , 'document_srl' => $pages::getCategoryId(187)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(187)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(187)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(187)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(186)['0']->mid }}"
                                           class="header-text-column">필리핀 관련 동영상</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(186)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(186)['0']->mid , 'document_srl' => $pages::getCategoryId(186)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(186)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(186)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(186)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 row-bottom-space">
                            <div class="row">
                                <div class="col row align-items-center body-data-row">
                                    <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                        <i class="far fa-folder fa-lg"></i>
                                        <a href="{{ 'content/'.$pages::getCategoryId(185)['0']->mid }}"
                                           class="header-text-column">필리핀 사진</a>
                                    </p>
                                </div>
                                <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                    <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(185)}}</p>
                                </div>
                                <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                    <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(185)['0']->mid , 'document_srl' => $pages::getCategoryId(185)['0']->document_srl ]) }}"
                                       class="header-text-title"> {{$pages::getCategoryId(185)['0']->title}}</a>
                                    <small>
                                        <br> by
                                        <a href="#"
                                           class="ml-1 mr-2 ">{{$pages::getCategoryId(185)['0']->user_id}}</a>
                                        <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(185)['0']->regdate))}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-12 data one-->
                    </div>
                </div>
                <!-- End List Of Categories -->

                <!-- Sidebar News -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="title-news">
                            <i class="far fa-comment-dots"></i>
                            <h3>Buy n Sell (Under Maintenance)</h3>
                        </div>

                        <div>
                            <a href="#" class="news-text"><i class="fas fa-car"></i> Car</a>
                        </div>
                        <div>
                            <a href="#" class="news-text"><i class="fas fa-mobile-alt"></i> Phones</a>
                        </div>
                        <div>
                            <a href="#" class="news-text"><i class="far fa-heart"></i> Beauty & Health</a>
                        </div>
                        <div>
                            <a href="#" class="news-text"><i class="fas fa-tshirt"></i> Clothes</a>
                        </div>
                        <div>
                            <a href="#" class="news-text"><i class="fas fa-id-card-alt"></i> Jobs</a>
                        </div>
                        <div>
                            <a href="#" class="news-text"><i class="fas fa-headset"></i> Services</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="title-news">
                            <i class="far fa-comment-dots"></i>
                            <h3>Recent Post (Under Maintenance)</h3>
                        </div>

                        <div class="row nowrap">
                            <ul class="col-sm-12">
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"><p class="title-product">Furniture</p></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"></a></li>
                            </ul>
                            <ul class="col-sm-12">
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"><p>Title</p></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"></a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="box">
                        <div class="title-news">
                            <i class="far fa-newspaper"></i>
                            <h3>필리핀 카페 - 뉴스</h3>
                        </div>


                        {{--@foreach($result as $img)--}}
                        {{--<div class="img-thumbnail">--}}
                        {{--{!! $img !!}--}}
                        {{--</div>--}}
                        {{--@endforeach--}}

                        <div class="img-news">
                            <a href="#">
                                @foreach($result as $img)
                                    {!! $img !!}
                                @endforeach()
                            </a>
                            <a href="#" class="news-main-text mt-3 mb-3">
                                @foreach($latest_news as $latest_new)
                                    {!! $latest_new->title !!}
                                @endforeach
                            </a>
                        </div>

                        @foreach($xe_modules as $news)
                            <div>
                                <a href="#" class="news-text">{!! $news->title !!}</a>
                            </div>
                        @endforeach
                        {{--<div>--}}
                        {{--<a href="#" class="news-text">필리핀군 BIFF 인질 31명 전원 안전하게 구출</a>--}}
                        {{--</div>--}}
                        {{--<div>--}}
                        {{--<a href="#" class="news-text">현대제철, 필리핀서 취업·창업 지원 나서</a>--}}
                        {{--</div>--}}
                        {{--<div>--}}
                        {{--<a href="#" class="news-text">필리핀군 BIFF 인질 31명 전원 안전하게 구출</a>--}}
                        {{--</div>--}}
                        {{--<div>--}}
                        {{--<a href="#" class="news-text">필리핀군 BIFF 인질 31명 전원 안전하게 구출</a>--}}
                        {{--</div>--}}
                    </div>
                </div>


            </div>
        </div>
        </div>
    </section>

@endsection


