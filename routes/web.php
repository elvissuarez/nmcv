<?php

/**
 * @file
 */

use Illuminate\Support\Facades\Route;

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

// Auth::routes();
Auth::routes(['register' => FALSE]);

Route::get(
    '/', function () {
        return view('auth.login');
    }
);

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(
    function () {
        Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']])->middleware('can:manage-users');
        Route::resource('/roles', 'RolesController', ['except' => ['show', 'destroy']])->middleware('can:manage-users');
        // Sucursales routes.
        Route::resource('/sucursales', 'OfficeController')->middleware('can:manage-offices');
        // Proveedores routes.
        Route::resource('/proveedores', 'ProviderController')->middleware('can:manage-providers');
    }
);


