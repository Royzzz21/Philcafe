@extends('layouts.admin')

@section('content')
    <h3 class="page-title">@lang('quickadmin.items.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.companies.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
          <div class="row">
              <div class="col-xs-2 form-group">
                  {!! Form::label('logo', trans('quickadmin.items.fields.logo').'', ['class' => 'control-label']) !!}
                  {!! Form::hidden('logo', old('logo')) !!}
                  {!! Form::file('logo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                  {!! Form::hidden('logo_max_size', 10) !!}
                  {!! Form::hidden('logo_max_width', 8096) !!}
                  {!! Form::hidden('logo_max_height', 8096) !!}
                  <p class="help-block"></p>
                  @if($errors->has('logo'))
                      <p class="help-block">
                          {{ $errors->first('logo') }}
                      </p>
                  @endif
              </div>
              <div class="col-xs-2 form-group">
                  {!! Form::label('logo1', trans('quickadmin.items.fields.logo1').'', ['class' => 'control-label']) !!}
                  {!! Form::hidden('logo1', old('logo2')) !!}
                  {!! Form::file('logo1', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                  {!! Form::hidden('logo_max_size', 10) !!}
                  {!! Form::hidden('logo_max_width', 8096) !!}
                  {!! Form::hidden('logo_max_height', 8096) !!}
                  <p class="help-block"></p>
                  @if($errors->has('logo1'))
                      <p class="help-block">
                          {{ $errors->first('logo1') }}
                      </p>
                  @endif
              </div>
              <div class="col-xs-2 form-group">
                  {!! Form::label('logo2', trans('quickadmin.items.fields.logo2').'', ['class' => 'control-label']) !!}
                  {!! Form::hidden('logo2', old('logo')) !!}
                  {!! Form::file('logo2', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                  {!! Form::hidden('logo_max_size', 10) !!}
                  {!! Form::hidden('logo_max_width', 8096) !!}
                  {!! Form::hidden('logo_max_height', 8096) !!}
                  <p class="help-block"></p>
                  @if($errors->has('logo2'))
                      <p class="help-block">
                          {{ $errors->first('logo2') }}
                      </p>
                  @endif
              </div>
              <div class="col-xs-2 form-group">
                  {!! Form::label('logo3', trans('quickadmin.items.fields.logo3').'', ['class' => 'control-label']) !!}
                  {!! Form::hidden('logo3', old('logo')) !!}
                  {!! Form::file('logo3', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                  {!! Form::hidden('logo_max_size', 10) !!}
                  {!! Form::hidden('logo_max_width', 8096) !!}
                  {!! Form::hidden('logo_max_height', 8096) !!}
                  <p class="help-block"></p>
                  @if($errors->has('logo3'))
                      <p class="help-block">
                          {{ $errors->first('logo3') }}
                      </p>
                  @endif
              </div>
          </div>
          <div class="row">

          </div>        
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', trans('quickadmin.items.fields.price').'', ['class' => 'control-label']) !!}
                    {!! Form::number('price', old('price'), ['class' => 'form-control', 'step'=>"any"]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('stocks', trans('quickadmin.items.fields.stocks').'', ['class' => 'control-label']) !!}
                    {!! Form::number('stocks', old('stocks'), ['class' => 'form-control',  'type' => 'number']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('stocks'))
                        <p class="help-block">
                            {{ $errors->first('stocks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('city_id', trans('quickadmin.items.fields.city').'', ['class' => 'control-label']) !!}
                    {!! Form::select('city_id', $cities, old('city_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('city_id'))
                        <p class="help-block">
                            {{ $errors->first('city_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('subcategories', trans('quickadmin.items.fields.categories').'', ['class' => 'control-label']) !!}
                    {!! Form::select('subcategories[]', $subcategories, old('subcategories'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('subcategories'))
                        <p class="help-block">
                            {{ $errors->first('subcategories') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address', trans('quickadmin.items.fields.address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.items.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
