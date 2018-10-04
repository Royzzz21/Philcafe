@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Personal Profile <span>|</span> <a href="{{ action('DashboardController@edit', $user->id) }}">Edit</a> </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">

                            <img src="{{ asset('images/profile_pictures/'.$user->photo) }}" id="photo" alt="{{ $user->name  }}" width="134px" height="134px">
                        </div><!-- Profile Pictures-->
                        <div class="col-sm-8 text-center">
                            <p class="mx-auto mt-3 pt-4 mb-0">{{ $user->name }} </p>
                            <p class="mx-auto mb-0">{{ $user->email }}</p>
                        </div>
                    </div>
                </div><!-- col-sm-12 -->

                <hr>

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Gender:</b> {{ $user->gender }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-right"><b>Birthdate:</b> {{ $user->birthdate }}</p>
                        </div>
                        <div class="col-sm-12">
                            <p class=""><b>Contact number:</b> 0{{ $user->phone }}</p>
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
                            @foreach ($users_posts as $users_post)
                                <blockquote class="blockquote">
                                    @if ($users_post->module_srl == 160)
                                        <a href="{{ route('single_content',['nav_url' => 'chobo', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                            @elseif($users_post->module_srl == 161)
                                                <a href="{{ route('single_content',['nav_url' => 'life', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                    @elseif($users_post->module_srl == 162)
                                                        <a href="{{ route('single_content',['nav_url' => 'bz', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                            @elseif($users_post->module_srl == 163)
                                                                <a href="{{ route('single_content',['nav_url' => 'soho', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                    @elseif($users_post->module_srl == 164)
                                                                        <a href="{{ route('single_content',['nav_url' => 'bu', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                            @elseif($users_post->module_srl == 165)
                                                                                <a href="{{ route('single_content',['nav_url' => 'visa', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                    @elseif($users_post->module_srl == 166)
                                                                                        <a href="{{ route('single_content',['nav_url' => 'lan', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                            @elseif($users_post->module_srl == 167)
                                                                                                <a href="{{ route('single_content',['nav_url' => 'study', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                    @elseif($users_post->module_srl == 168)
                                                                                                        <a href="{{ route('single_content',['nav_url' => 'col', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                            @elseif($users_post->module_srl == 169)
                                                                                                                <a href="{{ route('single_content',['nav_url' => 'tour', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                    @elseif($users_post->module_srl == 170)
                                                                                                                        <a href="{{ route('single_content',['nav_url' => 'phil', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                            {{-- ======================================================================= SUB CATEGORY ==================================================================== --}}

                                                                                                                            @elseif($users_post->module_srl == 49)
                                                                                                                                <a href="{{ route('single_content',['nav_url' => 'notice', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                    @elseif($users_post->module_srl == 172)
                                                                                                                                        <a href="{{ route('single_content',['nav_url' => 'free', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                            @elseif($users_post->module_srl == 171)
                                                                                                                                                <a href="{{ route('single_content',['nav_url' => 'faq', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                    @elseif($users_post->module_srl == 180)
                                                                                                                                                        <a href="{{ route('single_content',['nav_url' => 'toget', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                            @elseif($users_post->module_srl == 176)
                                                                                                                                                                <a href="{{ route('single_content',['nav_url' => 'korphil', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                    @elseif($users_post->module_srl == 184)
                                                                                                                                                                        <a href="{{ route('single_content',['nav_url' => 're', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                            @elseif($users_post->module_srl == 173)
                                                                                                                                                                                <a href="{{ route('single_content',['nav_url' => 'ex', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                                    @elseif($users_post->module_srl == 181)
                                                                                                                                                                                        <a href="{{ route('single_content',['nav_url' => 'philnew', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                                            @elseif($users_post->module_srl == 183)
                                                                                                                                                                                                <a href="{{ route('single_content',['nav_url' => 'bznews', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                                                    @elseif($users_post->module_srl == 162)
                                                                                                                                                                                                        <a href="{{ route('single_content',['nav_url' => 'soho', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                                                            @elseif($users_post->module_srl == 164)
                                                                                                                                                                                                                <a href="{{ route('single_content',['nav_url' => 'bu', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                                                                    @elseif($users_post->module_srl == 187)
                                                                                                                                                                                                                        <a href="{{ route('single_content',['nav_url' => 'tag', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                                                                            @elseif($users_post->module_srl == 186)
                                                                                                                                                                                                                                <a href="{{ route('single_content',['nav_url' => 'movie', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">

                                                                                                                                                                                                                                    @elseif($users_post->module_srl == 185)
                                                                                                                                                                                                                                        <a href="{{ route('single_content',['nav_url' => 'photo', 'document_srl' => $users_post->document_srl ]) }}" id="dashboard_title_link" class="text-capitalize">
                                                                                                                                                                                                                                            @endif

                                                                                                                                                                                                                                            <cite title="Source Title">{!! $users_post->title !!}</cite>

                                                                                                                                                                                                                                            @if (Carbon\Carbon::parse($users_post->created_at)->format('Y-m-d') == $current_date)
                                                                                                                                                                                                                                                <span class="float-right"><h5><span class="badge badge-success">New</span></h5></span>
                                                                                                                                                                                                                                            @endif
                                                                                                                                                                                                                                        </a>

                                                                                                                                                                                                                                        <div id="post_content">
                                                                                                                                                                                                                                            {!! str_limit($users_post->content, 50 , '..') !!}
                                                                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                                                                <div class="col-sm-6">
                                                                                                                                                                                                                                                    <p class="blockquote-footer">
                                                                                                                                                                                                                                                        <cite title="Source Title">{{ $users_post->nick_name }}</cite>
                                                                                                                                                                                                                                                    </p>
                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                <div class="col-sm-6 text-right">
                                                                                                                                                                                                                                                    <div class="dashboard-action-separator d-inline-block">
                                                                                                                                                                                                                                                        <a href="{{ route('delete', ['id' => $users_post->document_srl ]) }}" class="text-danger dashboard_action_separator">Delete</a>
                                                                                                                                                                                                                                                        <a href="/{{ $users_post->document_srl }}/edit" class="text-success dashboard_action_separator mr-2">Edit</a>
                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                    <small><cite>{{ date("Y-m-d", strtotime($users_post->created_at)) }}</cite></small>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                        </div>
                                </blockquote>
                                <hr>
                            @endforeach
                        </div><!-- User's post -->
                    </div>
                </div>
            </div><!-- ROW -->
        </div><!-- col-md-8 -->
    </div>
    <hr>
    {{ $users_posts->render() }}
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
