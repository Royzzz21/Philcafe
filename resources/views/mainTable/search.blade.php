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
					<h2>Results</h2>
					<p> Results</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                        @foreach ( $categories_all as $category_all)
                            <h3><a href="{{ route('category', [$category_all->id]) }}">{{ $category_all->name}} </a></h3>
                            <ul class="category-list">
                                @foreach ( $category_all->subcategories->take(4) as $subcategory)
                                    <li><smalll><a href="#"> - {{ $subcategory->name}} </a></smalll></li>
                                @endforeach
                            </ul>
                            @endforeach
                    </div>
				</div>
			</div>
            <div class="col-md-9">

			</div>
		</div>
	</div>
</section>


@stop