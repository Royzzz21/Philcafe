@extends('layouts.app')

@section('content')



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

        {{-- NEW POSTS --}}
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="card">
                        <div class="card-header">Create new post</div>
                        <div class="new-post-container p-3">
                            {!! Form::open(['action'=> 'DashboardController@store', 'method' => 'POST', 'encrypt' => 'multipart/form-data']) !!}
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="category">Category</label>
                                    <select name="category" class="form-control">
                                        <option value="160">Preparation</option>
                                        <option value="161">General/Life</option>
                                        <option value="162">Imigration/Bz</option>
                                        <option value="163">Business</option>
                                        <option value="164">Real Estate</option>
                                        <option value="165">Visa</option>
                                        <option value="166">language</option>
                                        <option value="167">Study</option>
                                        <option value="168">College</option>
                                        <option value="169">Travel</option>
                                        <option value="170">Phillippines</option>
                                    </select>
                                </div><!-- Category -->
                                <div class="form-group col-sm-8">
                                    <label for="category">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div><!-- title -->
                            </div><!-- ROW -->
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <div class="form-group">
                                        <textarea name="body" class="form-control" rows="5" id="article-ckeditor"></textarea>
                                    </div>
                                </div><!-- Text Area -->
                            </div><!-- ROW -->
                            <div class="row">
                                <div class="form-group col-sm-6 ">
                                    <input type="hidden" name="file">
                                </div><!-- File -->
                                <div class="form-group col-sm-6">
                                    <button type="submit" id="post_submit" class="btn btn-primary float-right">Post<i class="fas fa-pen ml-2"> </i></button>
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

                                                                                                                            @endif
                                                                                                                            <cite title="Source Title">{!! $users_post->title !!}</cite>
                                                                                                                            @if (Carbon\Carbon::parse($users_post->created_at)->format('Y-m-d') == $current_date)
                                                                                                                                <span class="float-right"><h5><span class="badge badge-secondary">New</span></h5></span>
                                                                                                                            @endif
                                                                                                                        </a>
                                                                                                                        <div id="post_content">
                                                                                                                            {!! $users_post->content !!}
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-sm-6">
                                                                                                                                    <p class="blockquote-footer">
                                                                                                                                        <cite title="Source Title">{{ $users_post->nick_name }}</cite>
                                                                                                                                    </p>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-6 text-right">
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

