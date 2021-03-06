@extends('layouts.mainTable')

@section('content')

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Philcafe Buy & Sell </h1>
					<p>Who buys has need of two eyes But one's enough to sell the stuff.</p>
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
                    {!! Form::open([ 'action' => 'HomePageController@table', 'method' => 'get']) !!}

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Search ']) !!}
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
                                        class="btn btn-main" style="border-radius: 25px;">
                                        Search Now
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}


				</div>

			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>Philcafe Categories</h2>
					<p>Choose a category and Enjoy!</p>
				</div>
                <div class="row">
                    @foreach ($categories_all->take(8) as $category_all)
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="{{ $category_all->icon }} icon-bg-{{ $category_all->id }}"></i>
                                    <h4>
                                        <a href="#">{{ $category_all->name }} </a>

                                    </h4>
                                </div>
                                <ul class="category-list">
                                    @foreach ( $category_all->subcategories->take(4) as $subcategory)
                                        <li><a href="{{ route('category', [$subcategory->id]) }}">{{ $subcategory->name}} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                            <!-- /Category List -->
                    @endforeach
                </div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


@stop
