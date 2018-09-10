@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.items.title')</h3>
    @can('item_create')
        <p>
            <a href="{{ route('admin.myitem.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

        </p>
    @endcan


    @can('item_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.myitem.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.myitem.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
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

                    <th>@lang('quickadmin.items.fields.name')</th>
                        <th>@lang('quickadmin.items.fields.price')</th>
                    <th>@lang('quickadmin.items.fields.city')</th>
                    <th>@lang('quickadmin.items.fields.categories')</th>
                    <th>@lang('quickadmin.items.fields.address')</th>
                    <th>@lang('quickadmin.items.fields.description')</th>
                    <th>@lang('quickadmin.items.fields.logo')</th>
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