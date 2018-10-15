<?php
Route::get('/bns', 'HomePageController@index');
Route::get('/', 'PagesController@index');
Route::get('/content', 'PagesController@content');
Route::get('/content/{nav_url}', 'PagesController@navigation_id');//navigation content
Route::get('/post/{document_srl}', 'PagesController@subject_content')->name('single_content');//navigation content



Route::get('search', 'HomePageController@table')->name('search');
Route::get('subcategories/{subcategory}', 'HomePageController@category')->name('category');
Route::get('companies/{company}', 'HomePageController@company')->name('company');
// Authentication Routes...

Route::get('/users/{name}', 'PostsController@show');
Auth::routes();

Route::resource('posts', 'PostsController');

Route::get('/{id}/edit', 'PostsController@edit');
Route::get('/delete/{id}', 'PostsController@delete')->name('delete');//delete
Route::get('/delete_comment/{id}', 'PostsController@delete_comment')->name('delete_comment');

Route::post('/store_comment', 'CommentsController@store_comment');//store_comment
Route::get('/edit/{id}', 'CommentsController@edit');


Route::get('/{nav_url}/create', 'PostsController@create');//navigation content
Route::post('', 'PostsController@store');

// DASHBOARD ROUTES
Route::get('/profile', 'DashboardController@index')->name('profile');
Route::post('/profile', 'DashboardController@edit_dashboard_post');
Route::post('update_post', 'DashboardController@update_post');
Route::get('/profile/delete/{id}', 'DashboardController@delete')->name('dashboard.delete');

Route::get('/edit_profile/{user_id}', 'DashboardController@edit');
Route::post('/edit_profile/store_edit', 'DashboardController@store_edit');
Route::post('','DashboardController@store');
Route::get('/delete_image/{id}', 'DashboardController@delete_image')->name('delete_image');


$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

 
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');

      // News Routes

    

    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('cities', 'Admin\CitiesController');
    Route::post('cities_mass_destroy', ['uses' => 'Admin\CitiesController@massDestroy', 'as' => 'cities.mass_destroy']);
    Route::post('cities_restore/{id}', ['uses' => 'Admin\CitiesController@restore', 'as' => 'cities.restore']);
    Route::delete('cities_perma_del/{id}', ['uses' => 'Admin\CitiesController@perma_del', 'as' => 'cities.perma_del']);
    Route::resource('categories', 'Admin\CategoriesController');
    Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoriesController@massDestroy', 'as' => 'categories.mass_destroy']);
    Route::post('categories_restore/{id}', ['uses' => 'Admin\CategoriesController@restore', 'as' => 'categories.restore']);
    Route::delete('categories_perma_del/{id}', ['uses' => 'Admin\CategoriesController@perma_del', 'as' => 'categories.perma_del']);

    Route::resource('subcategories', 'Admin\SubcategoriesController');
    Route::post('subcategories_mass_destroy', ['uses' => 'Admin\SubcategoriesController@massDestroy', 'as' => 'subcategories.mass_destroy']);
    Route::post('subcategories_restore/{id}', ['uses' => 'Admin\SubcategoriesController@restore', 'as' => 'subcategories.restore']);
    Route::delete('subcategories_perma_del/{id}', ['uses' => 'Admin\SubcategoriesController@perma_del', 'as' => 'subcategories.perma_del']);

    Route::resource('companies', 'Admin\CompaniesController');
    Route::post('companies_mass_destroy', ['uses' => 'Admin\CompaniesController@massDestroy', 'as' => 'companies.mass_destroy']);
    Route::post('companies_restore/{id}', ['uses' => 'Admin\CompaniesController@restore', 'as' => 'companies.restore']);
    Route::delete('companies_perma_del/{id}', ['uses' => 'Admin\CompaniesController@perma_del', 'as' => 'companies.perma_del']);


    Route::resource('myitem', 'Admin\MyitemController');


});


 // News Routes
 Route::get('news', ['uses' => 'Admin\NewsController@index', 'as' => 'news.index']);
 Route::get('news/add_news', ['uses' => 'Admin\NewsController@add_news', 'as' => 'news.add_news']);
 Route::post('news/store', 'Admin\NewsController@store');
 Route::post('news/store_update', 'Admin\NewsController@store_update');
 Route::get('news/update/{id}', ['uses' => 'Admin\NewsController@update', 'as' => 'news.update']);
 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


