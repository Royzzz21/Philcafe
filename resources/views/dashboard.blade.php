@extends('layouts.app')
@inject('dashboard', 'App\Http\Controllers\DashboardController')
@section('content')

@if (session('deleted'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session('deleted') }}
    </div><!-- DELETED MESSAGE -->

@elseif(session('updated'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('updated') }}
    </div><!-- UPDATED MESSAGE -->

@elseif(session('new_post'))
     <div class="alert alert-success text-center" role="alert">
        {{ session('new_post') }}
    </div><!-- UPDATED MESSAGE -->

@endif

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Personal Profile <span>|</span> <a href="{{ action('DashboardController@edit', $user_id) }}">Edit</a> </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/profile_pictures/'.$user[0]->photo) }}" id="photo" alt="{{ $user[0]->name  }}" width="134px" height="134px">
                        </div><!-- Profile Pictures-->
                        <div class="col-sm-8 text-center">
                            <p class="mx-auto mt-3 pt-4 mb-0">{{ $user[0]->name }} </p>
                            <p class="mx-auto mb-0">{{ $user[0]->email }}</p>
                        </div>
                    </div>
                </div><!-- col-sm-12 -->

                <hr>

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Gender:</b> {{ $user[0]->gender }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-right"><b>Birthdate:</b> {{ $user[0]->birthdate }}</p>
                        </div>
                        <div class="col-sm-12">
                            <p class=""><b>Contact number:</b> 0{{ $user[0]->phone }}</p>
                        </div>
                    </div>
                </div><!-- col-sm-12 -->
            </div><!-- card -->
        </div><!-- col-sm-4 -->

        {{-- NEW POSTS  s--}}
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="card">
                        <div class="card-header">Create new post</div>
                        <div class="new-post-container p-3">
                            @if (isset($_POST['edit_post']))
                                {!! Form::open(['action'=> 'DashboardController@update_post', 'method' => 'POST', 'encrypt' => 'multipart/form-data', 'files'=> true]) !!}
                            @else
                                {!! Form::open(['action'=> 'DashboardController@store', 'method' => 'POST', 'encrypt' => 'multipart/form-data', 'files'=> true ]) !!}
                            @endif
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="category">Category</label>
                                    <select name="category" class="form-control">
                                       
                                        <option value="160" {{ $dashboard->category(160, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Preparation</option>
                                        <option value="161" {{ $dashboard->category(161, isset($return_post->module_srl)? $return_post->module_srl : '') }}>General/Life</option>
                                        {{-- <option value="162" >Imigration/Bz</option> --}}
                                        <option value="163" {{ $dashboard->category(163, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Business</option>
                                        {{-- <option value="164" >Real Estate</option> --}}
                                        <option value="165" {{ $dashboard->category(165, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Visa</option>
                                        <option value="166" {{ $dashboard->category(166, isset($return_post->module_srl)? $return_post->module_srl : '') }}>language</option>
                                        <option value="167" {{ $dashboard->category(167, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Study</option>
                                        <option value="168" {{ $dashboard->category(168, isset($return_post->module_srl)? $return_post->module_srl : '') }}>College</option>
                                        <option value="169" {{ $dashboard->category(169, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Travel</option>
                                        <option value="170" {{ $dashboard->category(170, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Phillippines</option>
                                        {{-- SUB CATEGORY --}}
                                        <option value="49" {{ $dashboard->category(49, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Announcements</option>
                                        <option value="172" {{ $dashboard->category(172, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Free Board</option>
                                        <option value="171" {{ $dashboard->category(171, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Question Answer</option>
                                        {{-- <option value="180" >Like go / meet / ask</option> --}}
                                        <option value="176" {{ $dashboard->category(176, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Couple / International Marriage</option>
                                        <option value="184" {{ $dashboard->category(184, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Eat / Knol / Sights</option>
                                        <option value="173" {{ $dashboard->category(173, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Experience / Travel / Information</option>
                                        <option value="181" {{ $dashboard->category(181, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Philippine News</option>
                                        <option value="183" {{ $dashboard->category(183, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Business News</option>
                                        <option value="162" {{ $dashboard->category(162, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Founded</option>
                                        <option value="180" {{ $dashboard->category(180, isset($return_post->module_srl)? $return_post->module_srl : '') }}> Philippines / Travel / Meeting / Lightning / Making friends / Finding people, etc.</option>
                                        <option value="164" {{ $dashboard->category(164, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Real Estate</option>
                                        <option value="187" {{ $dashboard->category(187, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Filipino (Tagalog)</option>
                                        <option value="186" {{ $dashboard->category(186, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Filipino Related Videos</option>
                                        <option value="185" {{ $dashboard->category(185, isset($return_post->module_srl)? $return_post->module_srl : '') }}>Philippines Photos</option>

                                    </select>
                                </div><!-- Category -->
                                <div class="form-group col-sm-8">
                                    <label for="category">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ isset($return_post->title)?$return_post->title : '' }}">
                                    <input type="hidden" class="form-control" name="document_srl" value="{{ isset($return_post->document_srl)?$return_post->document_srl : '' }}">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div><!-- title -->
                            </div><!-- ROW -->
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <div class="form-group">
                                        <textarea name="body" class="form-control" rows="5" id="article-ckeditor" value=''>

                                            {{ isset($return_post->content)?$return_post->content : '' }}

                                        </textarea>
                                    </div>

                                    @if (isset($_POST['edit_post']))

                                        {{ $dashboard->file_type($return_post->file_type, $return_post->file, $return_post->document_srl) }}

                                    @endif
                                    
                                </div>
                            </div><!-- ROW -->
                            
                            <div class="row">
                                <div class="form-group col-sm-6 ">
                                    
                                    <input type="file" name="file">
                                    
                                    @if ($errors->has('file'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('file') }}</strong>
                                        </span>
                                    @endif
                                </div><!-- File -->
                                
                                <div class="form-group col-sm-6">
                                    <button type="submit" id="post_submit" class="btn btn-primary float-right">{{ isset($_POST['edit_post'])? 'Update' : 'Post' }}  <i class="fas fa-pen ml-2"> </i></button>
                                </div><!-- Submit -->
                            </div><!-- ROW -->
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div><!-- ROW -->

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
                                                {!! Form::open(['action'=> 'DashboardController@edit_dashboard_post', 'method'=> 'POST' , 'class'=> 'form-inline-block']) !!}
                                                <a href="{{ route('dashboard.delete', ['id' => $users_post->document_srl ]) }}" class="text-danger dashboard_action_separator">Delete</a>
                                                    <input type="hidden" name="post_id" value="{{ $users_post->document_srl }}">
                                                    <input type="submit" name="edit_post" value="Edit" class="text-success dashboard_action_separator mr-2">
                                                {!! Form::close() !!}
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

