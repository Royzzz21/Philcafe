@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">



            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>


            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
                @can('city_access')
                    <li class="{{ $request->segment(2) == 'cities' ? 'active' : '' }}">
                        <a href="{{ route('admin.cities.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">@lang('quickadmin.cities.title')</span>
                        </a>
                    </li>
                @endcan
                @can('category_access')
                    <li class="{{ $request->segment(2) == 'categories' ? 'active' : '' }}">
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">@lang('quickadmin.categories.title')</span>
                        </a>
                    </li>
                @endcan
                @can('subcategory_access')
                    <li class="{{ $request->segment(2) == 'subcategories' ? 'active' : '' }}">
                        <a href="{{ route('admin.subcategories.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">@lang('quickadmin.subcategories.title')</span>
                        </a>
                    </li>
                @endcan
                @can('company_access')
                    <li class="{{ $request->segment(2) == 'companies' ? 'active' : '' }}">
                        <a href="{{ route('admin.companies.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">All Product</span>
                        </a>
                    </li>
                @endcan

                @endcan
                @can('item_access')
                <li class="{{ $request->segment(2) == 'myitem' ? 'active' : '' }}">
                    <a href="{{ route('admin.myitem.index') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="title">@lang('quickadmin.items.title')</span>
                    </a>
                </li>

                @endcan

                <li class="{{ $request->segment(2) == 'subcategories' ? 'active' : '' }}">
                    <a href="{{ route('news.index') }}">
                        <i class="fa fa-key"></i>
                        <span class="title">News</span>
                    </a>
                </li><!-- NEWS -->



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
