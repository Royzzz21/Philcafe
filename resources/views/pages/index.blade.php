@extends('layouts.app')
@inject('pages', 'App\Http\Controllers\PagesController')
@section('content')

    <!-- Page Header -->
    <div class="container">
        <!-- First Row -->
        <div class="col-lg-12">
            <br>
            <div class="alert alert-warning" role="alert">
                Welcome to Philcafe !
                모든 디자인은 개발자에 의해 작동되고 있다. 후원해줘서 고마워요.
            </div>

            <!-- List Of Categories -->
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    {{-- NEWS --}}
                    <div class="row">
                        <div class="col-sm-12">

                            <a href="{{ route('newspage') }}">
                                <span id="news-title">News</span>
                            </a>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-3 p-0">
                           @include('pages.carousel')
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
                                <a href="{{ 'content/'.$pages::getCategoryId(49)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(49) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(49) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>

                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(49)}}</p>
                            </div>

                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block ">
                                <a href="/post/{{$pages::getCategoryId(49)['0']->document_srl}}"
                                   class="header-text-title">{{$pages::getCategoryId(49)['0']->title}} </a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(49)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(49)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(49)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Announcements -->

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
                                <a href="{{ 'content/'.$pages::getCategoryId(172)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(172) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(172) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>

                            <div class="col-sm-2 pl-0 row align-items-center body-data-row ">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(172)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                <a href="{{route('single_content',['nav_url' =>$pages::getCategoryId(172)['0']->mid , 'document_srl' => $pages::getCategoryId(172)['0']->document_srl ]) }}"
                                   class="header-text-title">{{$pages::getCategoryId(172)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(172)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(172)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(172)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Free Board -->

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
                                <a href="{{ 'content/'.$pages::getCategoryId(171)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(171) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(171) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(171)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(171)['0']->document_srl}}"
                                   class="header-text-title">{{$pages::getCategoryId(171)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(171)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(171)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(171)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Question and Answer -->
                </div><!-- Announcements -->

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
                    </div>  <!-- col-sm-12 HEADER-->


                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(180)['0']->mid }}"
                                       class="header-text-column">같이가기/모임/부탁 등
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(180)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(180) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(180) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(180)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(180)['0']->document_srl}}"
                                   class="header-text-title">{{$pages::getCategoryId(180)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(180)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(180)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(180)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Like go meet ask -->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(176)['0']->mid }}"
                                       class="header-text-column">코필커플/국제결혼
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(176)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(176) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(176) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row ">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(176)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                <a href="/post/{{$pages::getCategoryId(176)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(176)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(176)['0']->user_name}}"
                                       class="ml-1 mr-2">{{$pages::getCategoryId(176)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(176)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Couple International merriage -->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(184)['0']->mid }}"
                                       class="header-text-column">먹/놀/볼거리
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(184)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(184) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(184) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(184)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(184)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(184)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(184)['0']->user_name}}"
                                       class="ml-1 mr-2">{{$pages::getCategoryId(184)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(184)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Eat knol Sights-->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(173)['0']->mid }}"
                                       class="header-text-column">경험/여행/정보
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(173)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(173) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(173) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(173)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(173)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(173)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(173)['0']->user_name}}"
                                       class="ml-1 mr-2">{{$pages::getCategoryId(173)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(173)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div>
                </div><!-- Experience / Travel / Information -->

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
                    </div> <!-- col-sm-12 HEADER-->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(181)['0']->mid }}"
                                       class="header-text-column">필리핀 뉴스
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(181)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(181) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(181) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(181)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(181)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(181)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(181)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(181)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(181)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Philippine News -->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(183)['0']->mid }}"
                                       class="header-text-column">사업뉴스
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(183)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(183) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(183) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row ">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(183)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                <a href="/post/{{$pages::getCategoryId(183)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(183)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(183)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(183)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(183)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!--  Business News-->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(163)['0']->mid }}"
                                       class="header-text-column">창업
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(163)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(163) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(163) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(163)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                <a href="/post/{{$pages::getCategoryId(163)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(163)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(163)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(163)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(163)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div>
                </div><!-- Founded -->

                <!-- Life -->
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
                                       class="header-text-column"><span class="" style="font-size: 9px">필리핀 같이가기/여행/모임/친구만들기/사람찾기 등등</span>
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(180)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(180) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(180) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row ">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(180)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">
                                <a href="/post/{{ $pages::getCategoryId(180)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(180)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(180)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(180)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(180)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!--  Philippines / Travel / Meeting / Lightning / Making friends / Finding people, etc. -->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(164)['0']->mid }}"
                                       class="header-text-column">부동산
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(164)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(164) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(164) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(164)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(164)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(164)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(164)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(164)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(164)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Real estate -->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(187)['0']->mid }}"
                                       class="header-text-column">필리핀어 (따갈로그)
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(187)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(187) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(187) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(187)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(187)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(187)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(187)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(187)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(187)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Filipino Tagalog -->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(186)['0']->mid }}"
                                       class="header-text-column">필리핀 관련 동영상
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(186)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(186) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(186) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(186)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(186)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(186)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(186)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(186)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(186)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Filipino Related Videos -->

                    <div class="col-sm-12 row-bottom-space">
                        <div class="row">
                            <div class="col row align-items-center body-data-row">
                                <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                    <i class="far fa-folder fa-lg"></i>
                                    <a href="{{ 'content/'.$pages::getCategoryId(185)['0']->mid }}"
                                       class="header-text-column">필리핀 사진
                                    </a>
                                </p>
                                <a href="{{ 'content/'.$pages::getCategoryId(185)['0']->mid }}"
                                   class="header-text-column ml-auto">
                                    @if ($pages::new_post_count(185) != 0)
                                        <h6 class=""><span class="badge badge-success">New <span
                                                        class="badge badge-light">{{ $pages::new_post_count(185) }}</span></span>
                                        </h6>
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-2 pl-0 row align-items-center body-data-row">
                                <p class="m-0 ml-4 p-2 d-none d-md-inline-block">{{$pages::getCount(185)}}</p>
                            </div>
                            <div class="col-sm-5 row align-items-center body-data-row m-0 d-none d-md-inline-block pr-1">

                                <a href="/post/{{$pages::getCategoryId(185)['0']->document_srl}}"
                                   class="header-text-title"> {{$pages::getCategoryId(185)['0']->title}}</a>
                                <small>
                                    <br> by
                                    <a href="/users/{{$pages::getCategoryId(185)['0']->user_name}}"
                                       class="ml-1 mr-2 ">{{$pages::getCategoryId(185)['0']->user_name}}</a>
                                    <i class="fas fa-angle-double-right fa-xs"></i> {{date("Y-m-d g:i a", strtotime($pages::getCategoryId(185)['0']->regdate))}}
                                </small>
                            </div>
                        </div>
                    </div><!-- Philippines Photos -->

                </div>
            </div>
            <!-- End List Of Categories -->

            <!-- Sidebar News -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="box">
                    <div class="title-news">
                        <i class="far fa-comment-dots"></i>
                        <h3>Philcafe Buy&Sell</h3>
                    </div>

                    <div>
                        <a href="#" class="news-text"><i class="fas fa-shopping-cart"></i> New Products<span
                                    class="badge primary">5</span></a>
                    </div>
                    <div>
                        <a href="#" class="news-text"><i class="fas fa-mobile-alt"></i> Best Selling Products <span
                                    class="badge primary">5</span></a>
                    </div>
                </div>

                <div class="box">
                    <div class="title-news">
                        <i class="far fa-comment-dots"></i>
                        <a href="/bns" style="color: #fff; text-decoration:none;"><h3>Recent Post (Under
                                Maintenance)</h3></a>
                    </div>

                    <div class="row nowrap">
                      {{-- <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="#"><</a></li>
                          <li class="page-item"><a class="page-link" href="#">></a></li>
                        </ul> --}}

                        {{ $companies_all->links() }}
                        <ul class="col-sm-12">
                            @foreach ($companies_all as $company_all)
                                <li class="list-inline-item"><a
                                            href="{{ route('company', [$company_all->id]) }}"><img
                                                src="{{ asset(env('UPLOAD_PATH').'/' . $company_all->logo) }}"
                                                alt="Product" class="img-product">
                                        <p class="title-product">{{ $company_all->name }}</p></a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>


                    <div class="box">
                        <div class="title-news">
                            <i class="far fa-comment-dots"></i>
                            <a href="/bns" style="color: #fff; text-decoration:none;"><h3>2ndhand items</h3></a>
                        </div>

                        <div class="row nowrap">
                          {{ $companies->links() }}
                            <ul class="col-sm-12">
                            @foreach ($companies as $company_all)
                                <li class="list-inline-item"><a href="{{ route('company', [$company_all->id]) }}"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company_all->logo) }}" alt="Product" class="img-product"><p class="title-product">{{ $company_all->name }}</p></a></li>
                            @endforeach


                          </ul>
                            {{-- <ul class="col-sm-12">
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"><p class="title-product">Furniture</p></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"></a></li>
                            </ul>
                            <ul class="col-sm-12">
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"><p>Title</p></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{asset('images/product.jpg')}}" alt="Product" class="img-product"></a></li>
                            </ul> --}}
                        </div>

                    </div>

            </div>
        </div>
    </div>

@endsection
