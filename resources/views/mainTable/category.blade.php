@extends('layouts.mainTable')

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
                                        class="btn btn-primary" style="border-radius: 25px;">
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

<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Results For "{{ $category->subcategories}}"</h2>
					<p></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                            @foreach ( $categories_all as $category_all)
                                <h3><a href="#">{{ $category_all->name}} </a></h3>
								<ul class="category-list">
								@foreach ( $category_all->subcategories as $subcategory)
									<li><smalll><a href="{{ route('category', [$subcategory->id]) }}">- {{ $subcategory->name}} ({{ $subcategory->companies->count()}})  </a></smalll></li>
									@endforeach
									</ul>
                            @endforeach

                    </div>
				</div>
			</div>

			@foreach ($companies as $singleCompany)
				<div class="col-sm-12 col-lg-4 col-md-6">

					<!-- product card -->

					<div class="product-item bg-light">
						<div class="card">
							<div class="thumb-content">
								@if($singleCompany->logo)<a href="{{ route('company', [$singleCompany->id]) }}"><img class="card-img-top img-fluid" src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $singleCompany->logo) }}"/></a>@endif
							</div>
							<div class="card-body">
								<h4 class="card-title"><a href="{{ route('company', [$singleCompany->id]) }}"> ₱. {{$singleCompany->price}}</a></h4>
								@foreach ($singleCompany->subcategories as $singleCategories)
									<ul class="list-inline product-meta">
										<li class="list-inline-item">
											<a href="{{ route('category', [$singleCategories->id]) }}"><p>{{ $singleCategories->name }}</p><i class="fa fa-folder-open-o"></i>{{ $singleCategories->name }}</a>
										</li>
									</ul>
								@endforeach
								<p class="card-text">{{ substr($singleCompany->description, 0, 100) }}...</p>
							</div>
						</div>
					</div>
				</div>
			@endforeach


			</div>
		</div>
	</div>
</section>


@stop