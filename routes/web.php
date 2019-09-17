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

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => '/auth'], function () {
        Route::get('inloggen', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('inloggen', 'Auth\LoginController@login');
        Route::post('uitloggen', 'Auth\LoginController@logout')->name('logout');
        Route::get('registreren', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('registreren', 'Auth\RegisterController@register');
    });

    Route::group(['prefix' => '/beheer', 'middleware' => ['admin']], function () {
        Route::group(['prefix' => '/cms'], function () {
            Route::get('/nieuw', 'Beheer\CmsController@create')->name('cms.nieuw');

        });
    });
});
