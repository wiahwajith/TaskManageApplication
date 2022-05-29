<?php

use Inertia\Inertia;

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

//>>>>>>>>>>>> **** .... A D M I N ...... **** <<<<<<<<<<<<

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/AdminDashboard');
    });
    Route::get('/user', function () {
        return Inertia::render('Admin/UserAdd');
    });


});

