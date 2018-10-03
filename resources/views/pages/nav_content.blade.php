@extends('layouts.app')
@inject('pages', 'App\Http\Controllers\PagesController')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 cat-head">
                    <div class="row cat-cat">
                        <h4 class="title-cat">{{ $nav_contents['0']->browser_title }}</h4>
                        <a href="{{ '/'.$nav_url.'/create' }}" class="btn-new">New Topic <i class="fas fa-pen"></i></a>
                    </div>
                </div>

                <div class="row cat-cat">
                    <div class="float-right mt-1 row">{{ $nav_contents->links() }}</div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="cat-content">
                        <div class="col-sm-12 body-data-header mt-3">
                            <div class="row">
                                <div class="col row align-items-center">
                                    <b>
                                        <p class="text-light m-0 my-2 pl-4">Title</p>
                                    </b>
                                </div>
                                <div class="col-sm-5 row align-items-center d-none d-md-inline-block">
                                    <b>
                                        <p class="text-light my-2 ml-sm-1 ">Reply/Views</p>
                                    </b>
                                </div>
                            </div>
                        </div>

                        @foreach ($nav_contents as $nav_content)
                            <div class="col-sm-12 row-bottom-space">
                                {{-- {{ $loop->index+1 }} &nbsp;&nbsp;  <a href="{{ 'navigation_content/{ds}/sds' }}" class="text-dark"><b>TITLE-</b>  {{ $nav_content->title }} <b>REGDATE-</b> {{ $nav_content->regdate }} <b>READED-COUNT</b>  {{ $nav_content->readed_count }}<br></a>  --}}
                                <div class="row">
                                    <div class="col row align-items-center body-data-row">
                                        <p class="m-0 my-3 my-md-3" id="file-and-caption">
                                            <i class="far fa-folder fa-lg"></i>
                                            <a href="{{ route('single_content',['nav_url' => $nav_url, 'document_srl' => $nav_content->document_srl ]) }}"
                                               class="header-text-column">{{ $nav_content->title }}</a>
                                            <small>
                                                <br> by
                                                <a href="#" class="ml-1 mr-2 ">{{ $nav_content->nickname }}</a>
                                                <i class="fas fa-angle-double-right fa-xs"></i> {{ date("Y-m-d g:i a", strtotime($nav_content->document_regdate)) }}<!--The document_regdate is the document_regdate -->
                                            </small>
                                        </p>
                                      
                                    </div>
                                    <div class="col-sm-4 row  body-data-row d-md-block">
                                        <p class="my-3 my-md-3 d-none d-md-block"><i
                                                    class="fas fa-comments"></i><span
                                                    class="pl-2">{{ $nav_content->comment_count }}</span></p>
                                        <p class="my-3 my-md-3  d-none d-md-block"><i class="far fa-eye"></i><span
                                                    class="pl-2">{{ $nav_content->readed_count }}</span></p>

                                     
                                    </div>

                                    <div class="col-sm-1 row">
                                        @if (date("Y-m-d", strtotime($nav_content->created_at)) == Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class=""><h5 class=""><span class="badge badge-success">New</span></h5></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- col-sm-12 data one-->
                    </div>
                    <div class="float-right mt-1 row">{{ $nav_contents->render() }}</div>

                </div>

            </div>
        </div>
    </section>
@endsection