@extends('layouts.mainTable')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<style>


		/* these styles are for the demo, but are not required for the plugin */
		.zoom {
			display:inline-block;
			position: relative;
		}

		/* magnifying glass icon */
		.zoom:after {
			content:'';
			display:block;
			width:100px;
			height: 100px;
			position:absolute;
			top:0;
			right:0;
			background:url(icon.png);
		}

		.zoom img {
			display: block;
		}

		.zoom img::selection { background-color: transparent; }

		#ex2 img:hover { cursor: url(grab.cur), default; }
		#ex2 img:active { cursor: url(grabbed.cur), default; }
	</style>


<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script type="text/javascript" src="{{ asset('js/jquery.zoom.js') }}"></script>
<script>
  $(document).ready(function(){
    $('#ex1').zoom();
    $('#ex2').zoom();
    $('#ex3').zoom();
    $('#ex4').zoom();
  });
</script>

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
                                    <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a
                                                href="{{ route('category', [$singleCategories->id]) }}">
                                            <span class="label label-info label-many">{{ $singleCategories->name }}</span>
                                        </a></li>
                                @endforeach
                                <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a
                                            href="{{ route('search', ['city_id' => $company->city->id]) }}">{{ $company->city->name }}</a>
                                </li>
                            </ul>
                        </div>
                        <br>


                        <div id="demo" class="carousel slide danger" data-ride="carousel">

                            <div id="demo" class="carousel slide" data-ride="carousel">



                              <div class="carousel-inner">


                                    <div class="carousel-item active">
                                      <span class='zoom' id='ex1'>
                                            <img src='{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}' width='300' height='320' alt='Daisy on the Ohoopee'/>
                                      </span>

                                    </div>
                                    <div class="carousel-item">
                                      <span class='zoom' id='ex2'>
                                            <img src='{{ asset(env('UPLOAD_PATH').'/' . $company->logo1) }}' width='555' height='320' alt='Daisy on the Ohoopee'/>
                                      </span>
                                    </div>
                                    <div class="carousel-item">
                                      <span class='zoom' id='ex3'>
                                            <img src='{{ asset(env('UPLOAD_PATH').'/' . $company->logo2) }}' width='555' height='320' alt='Daisy on the Ohoopee'/>
                                      </span>
                                    </div>
                                    <div class="carousel-item">
                                      <span class='zoom' id='ex4'>
                                            <img src='{{ asset(env('UPLOAD_PATH').'/' . $company->logo3) }}' width='555' height='320' alt='Daisy on the Ohoopee'/>
                                      </span>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="btn" data-target="#demo" data-slide-to="0"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}"
                                                        width="100" height="50"/></div>
                                    <div class="btn" data-target="#demo" data-slide-to="1"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo1) }}"
                                                         width="100" height="50"/></div>
                                    <div class="btn" data-target="#demo" data-slide-to="2"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo2) }}"
                                                         width="100" height="50"/></div>
                                    <div class="btn" data-target="#demo" data-slide-to="3"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo3) }}"
                                                         width="100" height="50"/></div>
                                </div>
                          </div>
													<button type="button" class="btn btn-primary"><i class="fa fa-comments" style="font-size:25px;"></i> Send Message</button>
                            <div class="content">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <h3 class="tab-title">Price</h3>
                                          </div>
                                           <div class="col-md-6">
                                               <h3 class="tab-title">Quantity: {{ $company->stocks}}</h3>
                                             </div>
                                        </div>

                                         <p> ₱. {{ $company->price}}</p>
                                    </div>
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
                                        <h3 class="tab-title">Description</h3>
                                        <p>{{ $company->description}}</p>
                                    </div>
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
                                        <h3 class="tab-title">Addresss</h3>
                                        <p>{{ $company->address}}</p>
                                    </div>
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

																				<div class="">

																					<a href="{{ route('company', [$singleCompany->id]) }}">	<img src="{{ asset(env('UPLOAD_PATH').'/' . $singleCompany->logo) }}"
				                                                        width="50" height="30"/> {{ $singleCompany->name }}</a>
																				</div>



                                @endforeach
                            @endforeach
                        </div>
                        <!-- Map Widget -->
                    </div>
                </div>

            </div>
            <!-- Container End -->
    </section>

@stop
