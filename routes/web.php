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
    Route::get('/bioscopen/{slug}', 'Beheer\BioscoopController@view')->name('bios.show');
    Route::get('/bioscopen/{slug}/reserveren', 'ReservationController@show')->name('bios.reservations.show');
    Route::post('/bioscopen/{slug}/reserveren', 'ReservationController@store')->name('bios.reservations.store');
    Route::get('/bioscopen/{slug}/reserveren/{id}/betalen', 'ReservationController@create')->name('bios.reservations.pay');
    Route::get('/bioscopen/{slug}/zalen', 'Beheer\BioscoopController@zalen')->name('bios.zalen');
    Route::post('/contact', 'HomeController@contact')->name('contact');
    Route::get('/invoice', 'ReservationController@invoice')->name('invoice');

    Route::group(['prefix' => '/auth'], function () {
        Route::get('inloggen', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('inloggen', 'Auth\LoginController@login');
        Route::post('uitloggen', 'Auth\LoginController@logout')->name('logout');
        Route::get('registreren', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('registreren', 'Auth\RegisterController@register');
    });

    Route::group(['prefix' => '/beheer', 'middleware' => ['editor']], function () {
        Route::get('/', 'Beheer\AdminController@index')->middleware(['admin'])->name('admin.index');
        Route::group(['prefix' => '/cms', 'middleware' => ['admin']], function () {
            Route::get('/', 'Beheer\CmsController@index')->name('cms.index');
            Route::get('/nieuw', 'Beheer\CmsController@create')->name('cms.nieuw');
            Route::post('/nieuw', 'Beheer\CmsController@store')->name('cms.store');
            Route::get('/{id}/aanpassen', 'Beheer\CmsController@edit')->name('cms.edit');
            Route::post('/{id}/aanpassen', 'Beheer\CmsController@update')->name('cms.update');
            Route::post('/{id}/verwijderen', 'Beheer\CmsController@delete')->name('cms.delete');
        });
        Route::group(['prefix' => '/bioscopen', 'middleware' => ['approved']], function () {
            Route::get('/', 'Beheer\BioscoopController@index')->name('bios.index');
            Route::get('/nieuw', 'Beheer\BioscoopController@create')->name('bios.create');
            Route::post('/nieuw', 'Beheer\BioscoopController@store')->name('bios.store');
            Route::get('/{id}/aanpassen', 'Beheer\BioscoopController@edit')->name('bios.edit');
            Route::post('/{id}/aanpassen', 'Beheer\BioscoopController@update')->name('bios.update');
            Route::post('/{id}/verwijderen', 'Beheer\BioscoopController@delete')->middleware('admin')->name('bios.delete');
            Route::group(['prefix' => '/{id}/zalen'], function () {
                Route::get('/nieuw', 'Beheer\ZaalController@create')->name('zaal.create');
                Route::post('/nieuw', 'Beheer\ZaalController@store')->name('zaal.store');
                Route::get('/{zaalId}/aanpassen', 'Beheer\ZaalController@edit')->name('zaal.edit');
                Route::post('/{zaalId}/aanpassen', 'Beheer\ZaalController@update')->name('zaal.update');
                Route::post('/{zaalId}/verwijderen', 'Beheer\ZaalController@delete')->name('zaal.delete');
                Route::group(['prefix' => '/{zaalId}/tijdslot'], function () {
                    Route::get('/nieuw', 'Beheer\TimeController@create')->name('time.create');
                    Route::post('/nieuw', 'Beheer\TimeController@store')->name('time.store');
                    Route::get('/{tID}/aanpassen', 'Beheer\TimeController@edit')->name('time.edit');
                    Route::post('/{tID}/aanpassen', 'Beheer\TimeController@update')->name('time.update');
                    Route::post('/{tID}/verwijderen', 'Beheer\TimeController@delete')->name('time.delete');
                });
            });
        });
    });

    Route::get('{path}', 'Beheer\CmsController@handle');
});
