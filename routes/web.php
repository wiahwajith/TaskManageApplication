<?php

use Inertia\Inertia;
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

Route::get('/', function () {
    return Inertia::render('Views/Dashboard');
});
Route::get('/home', function () {
    return Inertia::render('index');
});
Route::get('/layout', function () {
    return Inertia::render('Views/Layout');
});
Route::get('/404', function () {
    return Inertia::render('Views/404');
});
Route::get('/Profile', function () {
    return Inertia::render('Views/Profile');
});
Route::get('/RTL', function () {
    return Inertia::render('Views/RTL');
});
Route::get('/sign-in', function () {
    return Inertia::render('Views/Sign-In');
});
Route::get('/sign-up', function () {
    return Inertia::render('Views/Sign-Up');
});
Route::get('/table', function () {
    return Inertia::render('Views/Tables');
});
