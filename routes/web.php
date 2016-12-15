<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::model('controlPublication', App\Publication::class);

Route::bind('publication', function ($slug) {
    return App\Publication::whereSlug($slug)->active()->firstOrFail();
});

Route::get('/', 'HomeController@index');

Route::get('/publications', 'Blog\PublicationsController@index');
Route::get('/publications/{publication}', 'Blog\PublicationsController@view');

Route::group(['middleware' => 'auth', 'prefix' => 'control'], function () {

    Route::get('/', 'Control\DashboardController@index');

    Route::get('/publications', [
        'as' => 'controlPublications',
        'uses' => 'Control\PublicationsController@index'
    ]);

    Route::get('/publications/add', 'Control\PublicationsController@add');
    Route::post('/publications/add', 'Control\PublicationsController@create');

    Route::get('/publications/{controlPublication}/edit', 'Control\PublicationsController@edit');
    Route::post('/publications/{controlPublication}/edit', 'Control\PublicationsController@update');

});


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
