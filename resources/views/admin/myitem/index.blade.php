@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.items.title')</h3>


    @can('company_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.companies.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.companies.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
        </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped  @can('item_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('item_delete')
                        @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                    @endcan

                    <th>@lang('quickadmin.companies.fields.name')</th>
                    <th>@lang('quickadmin.companies.fields.city')</th>
                    <th>@lang('quickadmin.companies.fields.categories')</th>
                    <th>@lang('quickadmin.companies.fields.address')</th>
                    <th>@lang('quickadmin.companies.fields.description')</th>
                    <th>@lang('quickadmin.companies.fields.logo')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>


    </script>
@endsection