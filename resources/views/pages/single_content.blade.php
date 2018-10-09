@extends('layouts.app')
@inject('dashboard', 'App\Http\Controllers\DashboardController')
@section('content')

    <style>
        p {
            padding: 0px 10px 0px 10px;
        }
    </style>

    {{-- POST SUBJECT FULL DETAILS --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h6>{{$post->title}}</h6>
            </div>
        </div>


        <div class="row withmargin" id="thread-container">
            <div class="col-sm-12 col-md-12 col-xl-2" id="first-row">
                @if(isset($user))
                <div class="row">
                    <div class="col-6 col-sm-12 text-center">
                        <img src="{{ asset('images/profile_pictures/'.$user->photo) }}" id="user-img-thread" class="img-fluid"
                             alt="user-img-thread">
                    </div>
                    <div class="col-6 pt-4 d-sm-none">
                        <a href="/users/{{$user->name}}">
                            <p class=" p-0 text-center" id="thread-username">{{ $post->nick_name }}</p>
                        </a>
                        <p class=" my-0" id="thread-title">Level 0 </p>
                        <p class="" id="established">Points: 0</p>
                    </div>

                </div><!-- First row top image section -->
                <div class="row ">
                    <div class="col-sm-12 d-none d-sm-block">
                        <a href="/users/{{$user->name}}"> <p class="text-center p-0" id="thread-username">{{ $post->nick_name }}</p></a>
                        <p class="text-center my-2" id="thread-title">Level 0</p>
                        <p class="text-center mb-2" id="established">Points: 0</p>
                    </div>
                </div><!-- First row top text section -->
                @else
                    <div class="row">
                        <div class="col-6 col-sm-12 text-center">
                            <img src="{{asset('images/profile_pictures/default-user.png')}}" id="user-img-thread" class="img-fluid"
                                 alt="user-img-thread">
                        </div>
                        <div class="col-6 pt-4 d-sm-none">
                            <a href="#">
                                <p class=" p-0 text-center" id="thread-username">{{ 'No User id'}}</p>
                            </a>
                            <p class=" my-0" id="thread-title">Level 0 </p>
                            <p class="" id="established">Points: 0</p>
                        </div>

                    </div><!-- First row top image section -->
                    <div class="row ">
                        <div class="col-sm-12 d-none d-sm-block">
                            <a href="#"> <p class="text-center p-0" id="thread-username">{{ 'No user id' }}</p></a>
                            <p class="text-center my-2" id="thread-title">Level 0</p>
                            <p class="text-center mb-2" id="established">Points: 0</p>
                        </div>
                    </div><!-- First row top text section -->
                @endif
            </div><!-- First row -->

            <div class="col-sm-8 col-md-9 col-xl-10" id="main-content">
                {{-- <div class="px-3 pt-3"> --}}
                <div class="row col-sm-12 px-3 mr-0 pb-5">
                
                        <div class="col-sm-12">
                            {{-- {{ dd($single_content[0]->file) }} --}}
{{-- =======================================IMAGES============================================== --}}

                        @if ($single_content[0]->file_type == 'jpg')
                            <img src="{{ asset('upload/'.$single_content[0]->file) }}" id="document_image">

                        @elseif($single_content[0]->file_type == 'PNG')  
                            <img src="{{ asset('upload/'.$single_content[0]->file) }}" id="document_image">

                        @elseif($single_content[0]->file_type == 'jpeg')
                            <img src="{{ asset('upload/'.$single_content[0]->file) }}" id="document_image">

                        @endif


{{-- =======================================IMAGES============================================== --}}

                        </div><!-- IMAGE OF DOCUMENT -->
                    {{-- @else
                    
                    @endif --}}

                    <p class="content-text px-2">
                        {!!$post->content !!}
                    </p>

                </div> <!-- thread-main-content -->

{{-- =======================================_FILES_============================================== --}}

            {{ $dashboard->file_type_on_single_content($single_content[0]->file_type, $single_content[0]->file, $single_content[0]->document_srl) }}

{{-- =======================================_FILES_============================================== --}}




                <div class="row" id="thread-bottom-row">
                    <div class="col-sm-12 fixed-bottom position-static px-4 pt-2">
                        <div class="row thread-bottom-row top">
                            <div class="col-sm-8">
                                <a href=""> <i class="fab fa-twitter-square fa-lg"></i> </a>
                                <a href=""> <i class="fab fa-facebook fa-lg"></i> </a>
                                <a href=""> <i class="fas fa-envelope-square  fa-lg"></i> </i> </a>
                            </div>
                            <div class="col-sm-4 text-right">
                                <a href=""> <i class="far fa-thumbs-down mr-1"><span
                                                class="badge reaction-count">0</span></i> </a>
                                <a href=""> <i class="far fa-thumbs-up"><span class="badge reaction-count">0</span></i>
                                </a>
                            </div>
                        </div><!-- bottom-first-row -->
                        <hr id="thread-hr">
                        <div class="row thread-bottom-row bottom">
                            <div class="col-sm-6">
                                <p class="text-left" id="reply">{{date("Y-m-d g:i a", strtotime($post->created_at))}}</p>
                            </div>
                            <div class="col-sm-6">
                                {{--<a href="#"><p class="d-inline float-right" id="reply">Reply</p></a>--}}
                                <p class="d-inline float-right" id="reply">views: {{$post->readed_count}}</p>

                                @if(!Auth::guest() && isset($user))
                                    @if(Auth::user()->id == $user->member_srl)
                                        <a href="/{{ $post->document_srl }}/edit"><p class="d-inline float-right" id="reply">Edit</p></a>
                                    @endif
                                @else
                                    <a href="/login"><p class="d-inline float-right" id="reply">Please Login first to comment</p></a>
                                @endif

                            </div>
                        </div><!-- bottom-second-row -->
                    </div>
                </div><!-- thread-bottom-row -->
            </div><!-- add 3 units padding -->
        </div><!-- Second row -->
    </div><!-- Main row -->

    @foreach ($comments as $comment)
        {{-- POST SUBJECT FULL DETAILS --}}
        <div class="container">


            <div class="col-sm-8 col-md-9 col-xl-10 offset-xl-2 offset-md-3 offset-sm-4">
                <div class="row" id="thread-container">
                    <div class="col-sm-12" id="main-content">
                        <div class="row col-sm-12 p-0 mr-0" id="thread-main-content">
                            {!! $comment->content !!}
                        </div> <!-- thread-main-content -->
                        <div class="row" id="thread-bottom-row">
                            <div class="col-sm-12 fixed-bottom position-static px-4">
                                <div class="row thread-bottom-row top">
                                    {{-- <div class="col-sm-8">
                                        <a href=""> <i class="fab fa-twitter-square fa-lg"></i> </a>
                                        <a href=""> <i class="fab fa-facebook fa-lg"></i> </a>
                                        <a href=""> <i class="fas fa-envelope-square  fa-lg"></i> </i> </a>
                                    </div> --}}
                                    <div class="col-sm-12 text-right">

                                    </div>
                                </div><!-- bottom-first-row -->
                                <hr id="thread-hr">
                                <div class="row thread-bottom-row bottom">
                                    <div class="col-sm-8 px-0">
                                        <p class="text-left" id="reply"><span
                                            class="nick-name">{{ $comment->nick_name }} </span> {{ date("Y-m-d g:i a", strtotime($comment->regdate)) }}
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-right" id="reply">
                                            <a href=""> <i class="far fa-thumbs-down mr-1"><span
                                                            class="badge reaction-count">0</span></i> </a>
                                            <a href=""> <i class="far fa-thumbs-up"><span
                                                            class="badge reaction-count">0</span></i> </a>
                                            <a href="#"> Reply </a>
                                        </p>
                                    </div>
                                </div><!-- bottom-second-row -->
                            </div>
                        </div><!-- thread-bottom-row -->
                    </div><!-- add 3 units padding -->
                </div><!-- Second row -->
            </div><!-- Main row -->
        </div><!-- main container -->
    @endforeach


    <br><br>

    @if(Auth::check())
        <div class="container">
            <div class="col-sm-8 col-md-9 col-xl-10 offset-xl-2 offset-md-3 offset-sm-4 px-0" >
                {!! Form::open(['action' => 'CommentsController@store_comment','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <label for="comment-area">Add a comment</label>
                        <input type="hidden" name="nick_name" value="{{Auth::user()->name }}">
                        <input type="hidden" name="document_srl" value="{{ $post->document_srl }}">
                        <input type="hidden" name="user_name" value="{{ Auth::user()->username }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="email_address" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="module_srl" value="{{ $post->module_srl }}">
                        <textarea class="form-control" id="comment-area" style="margin-top: 0px; margin-bottom: 0px; height: 79px;" name="content"></textarea>
                        <input type="submit" value="Send" class="btn btn-success float-right mt-2">
                    </div>
                {!! Form::close() !!}
            </div>
        </div><!-- add a new comment -->
    @endif

    
@endsection