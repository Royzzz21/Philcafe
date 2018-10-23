@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">

                <div class="card-header">Personal Profile <span>|</span> <a
                            href="{{ isset($user) ? action('DashboardController@edit', $user->id) : '' }}">Edit</a>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{ isset($user->photo) ? asset('images/profile_pictures/'.$user->photo) : asset('images/profile_pictures/default-user.png') }}"
                                 id="photo" alt="" width="134px" height="134px">
                        </div><!-- Profile Pictures-->
                        <div class="col-sm-8 text-center">
                            <p class="mx-auto mt-3 pt-4 mb-0">{{ isset($user->name) ? $user->name : $old_user->nick_name }} </p>
                            <p class="mx-auto mb-0">{{ isset($user->email) ? $user->email : $old_user->email_address  }}</p>
                        </div>
                    </div>
                </div><!-- col-sm-12 -->

                <hr>

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Gender:</b> {{ isset($user->gender) ? $user->gender : ' ' }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-right"><b>Birthdate:</b> {{ isset($user->birthdate) ? $user->birthdate : ' ' }}</p>
                        </div>
                        <div class="col-sm-12">
                            <p class=""><b>Contact number:</b> 0{{ isset($user->phone) ? $user->phone : ' ' }}</p>
                        </div>
                    </div>
                </div><!-- col-sm-12 -->
            </div><!-- card -->
        </div><!-- col-sm-4 -->

        {{-- NEW POSTS --}}
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="card">
                        <div class="card-header">Posts</div>
                        <div class="user-post p-3">
                            <blockquote class="blockquote">
                                @foreach($user_posts as $user_post)
                                    <a href="/post/{{$user_post->document_srl}}"
                                       id="dashboard_title_link" class="text-capitalize">
                                        <cite title="Source Title">{!! $user_post->title !!}</cite>
                                        @if (Carbon\Carbon::parse($user_post->created_at)->format('Y-m-d') == $current_date)
                                            <span class="float-right"><h5><span
                                                            class="badge badge-success">New</span></h5></span>
                                        @endif
                                    </a>
                                    <div id="post_content">
                                        {!! str_limit($user_post->content, 50 , '..') !!}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="blockquote-footer">
                                                    <cite title="Source Title">{{ $user_post->nick_name }}</cite>
                                                </p>
                                            </div>

                                            <div class="col-sm-6 text-right">
                                                {{--<div class="dashboard-action-separator d-inline-block">--}}
                                                {{--<a href="{{ route('delete', ['id' => $users_post->document_srl ]) }}" class="text-danger dashboard_action_separator">Delete</a>--}}
                                                {{--<a href="/{{ $users_post->document_srl }}/edit" class="text-success dashboard_action_separator mr-2">Edit</a>--}}
                                                {{--</div>--}}
                                                <small>
                                                    <cite>{{ date("Y-m-d", strtotime($user_post->created_at)) }}</cite>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </blockquote>
                            <hr>
                        </div><!-- User's post -->
                    </div>
                </div>
            </div><!-- ROW -->
        </div><!-- col-md-8 -->
    </div>
    <hr>
    {{ $user_posts->render() }}
    {{-- For post CONTENT --}}
    <style>
        p {
            margin-top: 3px;
            margin-bottom: 8px;
        }

        div#post_content {
            padding-left: 30px;
        }
    </style>
@endsection
