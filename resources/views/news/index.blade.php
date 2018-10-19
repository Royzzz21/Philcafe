@extends('layouts.app')
@section('content')
   
    <div class="container">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: #c94941;">
                    <li class="breadcrumb-item active text-light" aria-current="page">News</li>
                </ol>
            </nav><!-- breadcrumb -->
            
            {{ $news->render() }}

            @if ($featured_news != null)
            <div class="jumbotron">
                    <h1 class="display-4">Hello, world!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                  </div>
            @endif
           
            

            <div class="card-group">
                @foreach ($news as $news)
                    <div class="col-sm-3 px-2">
                        
                        <div class="card">
                            <img class="card-img-top " src="{{ asset('upload/news/'.$news->image) }}" alt="Card image cap">
                            <div class="card-body">
                                <a href="{{ route('news.single_news', ['id' => $news->id]) }}">
                                    <h5 class="card-title">{{ $news->title }}</h5>
                                </a>
                                <p class="card-text">{!! str_limit($news->content, 50) !!}</p>
                                <p class="card-text"><small class="text-muted">{{ $news->created_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                        
                    </div><!-- col-sm-3 -->
                @endforeach

            </div><!-- card-group -->
        </div><!-- col sm-12 -->
    </div><!-- CONTAINER -->


<style>
    .col-sm-6.index-news-header-bgcolor {
        background-color: #c94941;
        height: 35px;
        border-radius: 3px;
    }

 
</style>

@endsection