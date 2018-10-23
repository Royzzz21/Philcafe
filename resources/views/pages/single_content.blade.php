@extends('layouts.app')
@inject('dashboard', 'App\Http\Controllers\DashboardController')
@section('content')

    <style>
        p {
            padding: 0px 10px 0px 10px;
        }

        #comment-reply {
            display: none;
        }

        #comment-reply1 {
            display: none;
        }

    </style>

    {{-- POST SUBJECT FULL DETAILS --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h6>{{$post->title}}</h6>

                <div>{{$post->comment}}</div>
            </div>
        </div>

        <div class="row withmargin" id="thread-container">
            <div class="col-sm-12 col-md-12 col-xl-2 clearfix" id="first-row">
                @if(isset($user))
                    <div class="row">
                        <div class="col-6 col-sm-12 text-center">
                            <img src="{{ asset('images/profile_pictures/'.$user->photo) }}" id="user-img-thread"
                                 class="img-fluid"
                                 alt="user-img-thread">
                        </div>
                        <div class="col-6 pt-4 d-sm-none">
                            <a href="/users/{{$post->user_name}}">
                                <p class="p-0 text-center" id="thread-username">{{ $post->nick_name }}</p>
                            </a>
                            <p class=" my-0 d-none d-md-inline-block" id="thread-title">Level 0 </p>
                            <p class="d-none d-md-inline-block" id="established">Points: 0</p>
                        </div>
                    </div><!-- First row top image section -->
                    <div class="row ">
                        <div class="col-sm-12 d-none d-sm-block">
                            <a href="/users/{{$post->user_name}}"><p class="text-center p-0"
                                                                     id="thread-username">{{ $post->nick_name }}</p></a>
                            <p class="text-center my-2" id="thread-title">Level 0</p>
                            <p class="text-center mb-2" id="established">Points: 0</p>
                        </div>
                    </div><!-- First row top text section -->
                @else
                    <div class="row">
                        <div class="col-6 col-sm-12 text-center">
                            <img src="{{asset('images/profile_pictures/default-user.png')}}" id="user-img-thread"
                                 class="img-fluid"
                                 alt="user-img-thread">
                        </div>
                        <div class="col-6 pt-4 d-sm-none">
                            <a href="#">
                                <p class=" p-0 text-center" id="thread-username">{{ 'No User id'}}</p>
                            </a>
                            <p class=" my-0 " id="thread-title">Level 0 </p>
                            <p class="" id="established">Points: 0</p>
                        </div>

                    </div><!-- First row top image section -->
                    <div class="row ">
                        <div class="col-sm-12 d-none d-sm-block">
                            <a href="#"><p class="text-center p-0" id="thread-username">{{ 'No user id' }}</p></a>
                            <p class="text-center my-2" id="thread-title">Level 0</p>
                            <p class="text-center mb-2" id="established">Points: 0</p>
                        </div>
                    </div><!-- First row top text section -->
                @endif
            </div><!-- First row -->

            <div class="col-sm-8 col-md-9 col-xl-10" id="main-content">
                {{-- <div class="px-3 pt-3"> --}}
                <div class="row col-sm-12 px-3 mr-0 pb-5">
                    {{-- =======================================IMAGES============================================== --}}
                    {{-- THE JS CODE IS LOCATED IN FOOTER --}}
                    <div class="col-sm-12">
                        <input type="button" id="show_hide" value="Show image/file" onclick="showhide()">
                        {{-- <i class="fas fa-arrow-down" id="down"></i>
                        <i class="fas fa-arrow-up" id="up"></i> --}}
                        <div id="image_container" class="d-none">
                            {{-- =======================================_FILES_============================================== --}}
                            {{ $dashboard->file_type_on_single_content($single_content[0]->file_type, $single_content[0]->file, $single_content[0]->document_srl) }}
                            @if ($single_content[0]->file_type == 'image')

                                <img src="{{ asset('upload/'.$single_content[0]->file) }}" id="document_image">
                            @endif
                        </div>
                    </div><!-- IMAGE OF DOCUMENT -->
                    {{-- =======================================IMAGES============================================== --}}
                    <div class="content-text px-2">
                        {!!$post->content !!}
                    </div>
                </div> <!-- thread-main-content -->
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
                                <p class="text-left"
                                   id="reply">{{date("Y-m-d g:i a", strtotime($post->created_at))}}</p>
                            </div>
                            <div class="col-sm-2">
                                {{--<a href="#"><p class="d-inline float-right" id="reply">Reply</p></a>--}}
                                {{--<p class="d-inline float-right" id="reply">views: {{$post->readed_count}}</p>--}}
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $post->member_srl)
                                        <a href="/{{ $post->document_srl }}/edit"><p class="d-inline float-right"
                                                                                     id="reply">Edit</p></a>
                                        <a href="/profile"><p class="d-inline float-right"
                                                              id="reply">Delete</p></a>
                                    @endif
                                @else
                                    <a href="/login"><p class="d-inline float-right" id="reply">Please Login first to
                                            comment</p></a>
                                @endif
                            </div>
                        </div><!-- bottom-second-row -->
                    </div>
                </div><!-- thread-bottom-row -->
            </div><!-- add 3 units padding -->
        </div><!-- Second row -->
    </div><!-- Main row -->

    <div class="row">
        @if(Auth::check())
            <div class="container">
                <div class="col-sm-8 col-md-9 col-xl-10 offset-xl-2 offset-md-3 offset-sm-4 px-0">
                    {!! Form::open(['action' => 'CommentsController@store_comment','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <label for="comment-area">Add a comment</label>
                        <input type="hidden" name="document_srl" value="{{ $post->document_srl }}">
                        <input type="hidden" name="module_srl" value="{{ $post->module_srl }}">
                        <textarea class="form-control" id="comment-area"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 79px;" name="body"></textarea>
                        <input type="submit" value="Comment" class="btn btn-success float-right mt-2">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div><!-- add a new comment -->
        @endif
    </div>

    {{-- Comments and Reply Section --}}
    @foreach ($comments as $comment)
        <div class="container mt-2">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="row" id="thread-container">
                    <div class="col-sm-2" id="first-row">
                        <div class="col-6 col-sm-12 text-center">
                            <img src="{{ asset('images/profile_pictures/'.$comment->photo) }}" width="200"
                                 id="user-img-thread"
                                 class="img-fluid"
                                 alt="user-img-thread">
                        </div>
                        <div class="col-6 pt-4 d-sm-none">
                            <a href="/users/{{$comment->user_name}}">
                                <p class=" p-0 text-center" id="thread-username">{{ $comment->user_name }}</p>
                            </a>
                            <p class=" my-0 " id="thread-title">Level 0 </p>
                            <p class="" id="established">Points: 0</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-none d-sm-block">
                                <a href="/users/{{$comment->user_name}}">
                                    <p class="text-center p-0" id="thread-username">{{ $comment->user_name }}</p>
                                </a>
                                <p class="text-center my-2" id="thread-title">Level 0</p>
                                <p class="text-center mb-2" id="established">Points: 0</p>
                            </div>
                        </div><!-- First row top text section -->
                    </div>
                    <div class="col-sm-10" id="main-content">
                        <div class="col-sm-12 p-2 mr-0" id="thread-main-content">
                            {!! $comment->content !!}
                        </div> <!-- thread-main-content -->
                        <div class="row" id="thread-bottom-row">
                            <div class="col-sm-12 fixed-bottom position-static px-4">
                                <div class="row thread-bottom-row top">
                                    <div class="col-sm-12 text-right">
                                        <a href=""> <i class="far fa-thumbs-down mr-1"><span
                                                        class="badge reaction-count">0</span></i> </a>
                                        <a href=""> <i class="far fa-thumbs-up"><span
                                                        class="badge reaction-count">0</span></i>
                                        </a>
                                    </div>
                                </div>
                                <hr id="thread-hr">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-left" id="reply">{{$comment->created_at}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-inline ml-auto text-right">
                                            @if(!Auth::guest())
                                                @if(Auth::user()->id == $post->member_srl)
                                            <li><p class="list-inline-item"
                                                   id="reply"><a href="#" data-toggle="modal"
                                                                 data-target="#editModal"
                                                                 data-commentid="{{$comment->comment_srl}}"
                                                                 data-commentbody="{{$comment->content}}"
                                                    >Edit</a>
                                                </p></li>
                                            <li><p class="list-inline-item"
                                                   id="reply"><a href="#" data-toggle="modal"
                                                                 data-target="#deleteModal"
                                                                 data-commentid="{{$comment->comment_srl}}" class="">Delete</a>
                                                </p></li>
                                                @endif
                                                    <li><p  class="list-inline-item comment-reply" id="reply" data-commentreply="{{$comment->comment_srl}}" onclick="show(this);">Reply</p></li>
                                            @else
                                                <li><p  class="list-inline-item comment-reply" id="reply">Please Login first</p></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div><!-- bottom-second-row -->
                            </div>
                        </div><!-- thread-bottom-row -->
                    </div><!-- add 3 units padding -->

                    <!-- This is Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commentModal">Edit Comment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                {!! Form::open(['action' => 'CommentsController@update' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="comment_id" id="comment_id" class="form-control">
                                        <label for="comment-area">Edit reply</label>
                                        <label for="body">Content</label>
                                        <textarea name="body" id="comment_body" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancel
                                    </button>
                                    <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div> <!-- This is end of Edit Modal -->

                    <!-- This is Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commentModal">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                {!! Form::open(['action' => 'CommentsController@destroy' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <input type="hidden" name="comment_id" id="comment_id" class="form-control">
                                    Are you sure you want to delete this? asdas
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancel
                                    </button>
                                    <button type="submit" name="delete" class="btn btn-danger">Yes, Delete</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div> <!-- This is end of delete Modal -->

                </div>
            </div><!-- Column for row -->
            <div class="row">
                @if(Auth::check())
                    <div class="container">
                        <div class="col-sm-8 col-md-9 col-xl-10 offset-xl-2 offset-md-3 offset-sm-4 px-0">
                            <div id="comment-reply-{{$comment->comment_srl}}" style="display: none;">
                                {!! Form::open(['action' => 'CommentsController@store_comment','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="form-group">
                                    <label for="comment-area">Add a Reply to comment</label>
                                    <input type="hidden" name="document_srl" value="{{ $post->document_srl }}">
                                    <input type="hidden" name="module_srl" value="{{ $post->module_srl }}">
                                    <textarea class="form-control" id="comment-area-{{$comment->comment_srl}}"
                                              style=" margin-top: 0px; margin-bottom: 0px; height: 79px;"
                                              name="body"></textarea>
                                    <input type="submit" value="Comment" class="btn btn-success float-right mt-2">
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div><!-- add a new comment -->
                @endif
            </div>
        </div><!-- main container -->
    @endforeach

    <!-- Sample Comment Reply -->
    {{--<div class="container mt-2">--}}
        {{--<div class="offset-2 col-sm-10 col-md-10 col-xl-10">--}}
            {{--<div class="row" id="thread-container">--}}
                {{--<div class="col-sm-2" id="first-row">--}}
                    {{--<div class="col-6 col-sm-12 text-center">--}}
                        {{--<img src="{{ asset('images/default-user.png') }}" width="200"--}}
                             {{--id="user-img-thread"--}}
                             {{--class="img-fluid"--}}
                             {{--alt="user-img-thread">--}}
                    {{--</div>--}}
                    {{--<div class="col-6 pt-4 d-sm-none">--}}
                        {{--<a href="#">--}}
                            {{--<p class=" p-0 text-center" id="thread-username">Username</p>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-12 d-none d-sm-block">--}}
                            {{--<a href="#">--}}
                                {{--<p class="text-center p-0" id="thread-username">Username</p>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div><!-- First row top text section -->--}}
                {{--</div>--}}
                {{--<div class="col-sm-10" id="main-content">--}}
                    {{--<div class="col-sm-12 p-1 mr-0" id="thread-main-content">--}}
                        {{--This is sample Comment reply--}}
                    {{--</div> <!-- thread-main-content -->--}}
                    {{--<div class="row" id="thread-bottom-row">--}}
                        {{--<div class="col-sm-12 fixed-bottom position-static px-4">--}}
                            {{--<div class="row thread-bottom-row top">--}}
                                {{--<div class="col-sm-12 text-right">--}}
                                    {{--<a href=""> <i class="far fa-thumbs-down mr-1"><span--}}
                                                    {{--class="badge reaction-count">0</span></i> </a>--}}
                                    {{--<a href=""> <i class="far fa-thumbs-up"><span--}}
                                                    {{--class="badge reaction-count">0</span></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<hr id="thread-hr">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-6">--}}
                                    {{--<p class="text-left" id="reply">10-17-2018</p>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-6">--}}
                                    {{--<ul class="list-inline ml-auto text-right">--}}
                                        {{--<li><p class="list-inline-item"--}}
                                               {{--id="reply"><a href="#">edit</a>--}}
                                            {{--</p></li>--}}
                                        {{--<li><p class="list-inline-item"--}}
                                               {{--id="reply"><a href="#" data-toggle="modal"--}}
                                                             {{--data-target="#exampleModal">Delete</a></p></li>--}}
                                        {{--<li>--}}
                                            {{--<p class="list-inline-item comment-reply"--}}
                                               {{--id="reply" style="cursor: pointer;">Reply--}}
                                            {{--</p>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div><!-- bottom-second-row -->--}}
                        {{--</div>--}}
                    {{--</div><!-- thread-bottom-row -->--}}
                {{--</div><!-- add 3 units padding -->--}}
            {{--</div>--}}
        {{--</div><!-- Column for row -->--}}
    {{--</div><!-- main container -->--}}

    <div class="row">
        @if(Auth::check())
            <div class="container">
                <div class="col-sm-8 col-md-9 col-xl-10 offset-xl-2 offset-md-3 offset-sm-4 px-0">
                    <div id="comment-reply1">
                        {!! Form::open(['action' => 'CommentsController@store_comment','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="comment-area">Add a Reply to comment</label>
                            <input type="hidtden" name="nick_name" value="{{Auth::user()->name }}">
                            <input type="hidden" name="document_srl" value="{{ $post->document_srl }}">
                            <input type="hidden" name="user_name" value="{{ Auth::user()->username }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="email_address" value="{{ Auth::user()->email }}">
                            <input type="hidden" name="module_srl" value="{{ $post->module_srl }}">
                            <textarea class="form-control" id="comment-area"
                                      style="margin-top: 0px; margin-bottom: 0px; height: 79px;"
                                      name="content"></textarea>
                            <input type="submit" value="Comment" class="btn btn-success float-right mt-2">
                        </div>
                    </div>
                </div>
            </div><!-- add a new comment -->
        @endif
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    Are you sure you want to delete this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <br><br>
@endsection


@section('scripts')
    <script>

        var username = {!! json_encode($post->user_name) !!};
        function show(obj) {
            var comment_id = obj.getAttribute('data-commentreply');
            $("#comment-reply-" + comment_id).slideToggle("fast", function () {
                $("#comment_srl_"+comment_id).val(comment_id);
                $("#comment-area-" + comment_id).val('@'+username);
            });
        }

        $("#editModal").on('show.bs.modal', function (event) {
            var aTag = $(event.relatedTarget);
            var title = aTag.data('commentid'); //these data is from the button that trigger the modal
            var body = aTag.data('commentbody'); //data link tag the inside of parameter is the name of data tag
            var modal = $(this);
            modal.find('.modal-body #comment_id').val(title); // then add the value using the id's of input
            modal.find('.modal-body #comment_body').val(body);
        });

        $("#deleteModal").on('show.bs.modal', function (event) {
            var aTag = $(event.relatedTarget);
            var title = aTag.data('commentid');
            var modal = $(this);
            modal.find('.modal-body #comment_id').val(title);
        });
    </script>
@endsection