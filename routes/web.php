<?php
Route::get('/', 'PagesController@index');
Route::get('/content', 'PagesController@content');
Route::get('/content/{nav_url}', 'PagesController@navigation_id');//navigation content
Route::get('/content/{nav_url}/{document_srl}', 'PagesController@subject_content')->name('single_content');//navigation content
Route::post('/store_comment', 'CommentsController@store_comment');//store_comment
Route::get('search', 'HomePageController@table')->name('search');
Route::get('categories/{category}', 'HomePageController@category')->name('category');
Route::get('companies/{company}', 'HomePageController@company')->name('company');
Route::get('/bns', 'HomePageController@index');
// Authentication Routes...
Route::resource('posts', 'PostsController');
Auth::routes();
//Route::get('/{id}/edit', 'PostsController@edit');
//Route::get('/delete/{id}', 'PostsController@delete')->name('delete');//delete
//Route::get('/delete_comment/{id}', 'PostsController@delete_comment')->name('delete_comment');
//
//Route::get('/{nav_url}/create', 'PostsController@create');//navigation content
//Route::post('', 'PostsController@store');

Route::get('/profile', 'DashboardController@index')->name('profile');
Route::get('/edit_profile/{user_id}', 'DashboardController@edit');
Route::post('/edit_profile/store_edit', 'DashboardController@store_edit');
Route::post('','DashboardController@store');
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
});


