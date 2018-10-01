@extends('layouts.mainTable')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


@section('content')

<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
                    {!! Form::open([ 'action' => 'HomePageController@table', 'method' => 'get']) !!}

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Search company']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::select('categories', $search_categories, null , ['placeholder' => 'Category', 'class' => 'form-control form-control-lg']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('categories'))
                                    <p class="help-block">
                                        {{ $errors->first('categories') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::select('city_id', $search_cities, null, ['placeholder' => 'City', 'class' => 'form-control form-control-lg']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('city_id'))
                                    <p class="help-block">
                                        {{ $errors->first('city_id') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit"
                                        class="btn btn-primary">
                                        Search Now
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">{{ $company->name }}</h1>
					<div class="product-meta">
						<ul class="list-inline">
                            @foreach ($company->subcategories as $singleCategories)
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="{{ route('category', [$singleCategories->id]) }}">
                                        <span class="label label-info label-many">{{ $singleCategories->name }}</span>
                                </a></li>
                            @endforeach
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="{{ route('search', ['city_id' => $company->city->id]) }}">{{ $company->city->name }}</a></li>
						</ul>
					</div>
                    <br>

					<div id="demo" class="carousel slide danger" data-ride="carousel">

						<div id="demo" class="carousel slide" data-ride="carousel">
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" width="700" height="400">

							</div>
							<div class="carousel-item">
								<img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo1) }}" alt="Chicago" width="700" height="400">
							</div>
							<div class="carousel-item">
								<img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo2) }}" alt="New York" width="700" height="400">
							</div>
							<div class="carousel-item">
								<img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo3) }}" alt="New York" width="700" height="400">
							</div>
						</div>
						<a class="carousel-control-prev" href="#demo" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
						</a>
						<a class="carousel-control-next" href="#demo" data-slide="next">
							<span class="carousel-control-next-icon"></span>
						</a>
					</div>
									<td field-key='logo'>@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $company->logo) }}"/></a>@endif</td>
										<td field-key='logo'>@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo1) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo1) }}" width="100" height="50" /></a>@endif</td>
											<td field-key='logo'>@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo2) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo2) }}" width="100" height="50" /></a>@endif</td>
												<td field-key='logo'>@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo3) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo3) }}" width="100" height="50" /></a>@endif</td>
					<div class="content">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Price </h3>
								<p> ₱. {{ $company->price}}</p>
							</div>
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">About </h3>
								<p>{{ $company->description}}</p>
							</div>
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Where to find</h3>
								<p>{{ $company->address}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<!-- User Profile widget -->
					<div class="widget user">
						<h4>Other items in this category</h4>
                        @foreach ($company->subcategories as $singleCategories)
                            @foreach ($singleCategories->companies->shuffle()->take(10) as $singleCompany)
                            <li><a href="{{ route('company', [$singleCompany->id]) }}">{{ $singleCompany->name }}</a></li>
                            @endforeach
                        @endforeach
					</div>
					<!-- Map Widget -->
				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>

@stop
