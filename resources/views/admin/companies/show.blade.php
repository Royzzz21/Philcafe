@extends('layouts.admin')

@section('content')
    <h3 class="page-title">@lang('quickadmin.items.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.items.fields.name')</th>
                            <td field-key='name'>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.city')</th>
                            <td field-key='city'>{{ $company->city->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.categories')</th>
                            <td field-key='categories'>
                                @foreach ($company->subcategories as $singleCategories)
                                    <span class="label label-info label-many">{{ $singleCategories->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.address')</th>
                            <td field-key='address'>{{ $company->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.description')</th>
                            <td field-key='description'>{!! $company->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.logo')</th>
                            <td field-key='logo'>@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" width="100" height="50" ></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.logo')</th>
                            <td field-key='logo'>@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo1) }}" width="100" height="50"></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.logo')</th>
                            <td field-key='logo'>@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo2) }}" width="100" height="50" ></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.logo')</th>
                            <td field-key='logo'>@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/' . $company->logo3) }}" width="100" height="50"></a>@endif</td>
                        </tr>

                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.companies.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
