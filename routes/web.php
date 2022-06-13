<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::group(['middleware' => ['guest']], function() {

        
    });
    
    Route::group(['middleware' => ['auth','verify']], function() {

    
    });

    Route::get('/', function () {
        return Inertia::render('Views/Sign-In');
    });
    Route::get('/sign-in', function () {
        return Inertia::render('Views/Sign-In');
    });

    Route::get('/sign-up', function () {
        return Inertia::render('Views/Sign-Up');
    });
    Route::get('/verify', function () {
        return Inertia::render('Views/EmailVerify');
    })->name('email.verify');


    // Route::get('/dashboard', function () {
    //     return Inertia::render('Views/Dashboard');
    // })->name('dashboard');
    // Route::get('/user', function () {
    //     return Inertia::render('Admin/UserAdd');
    // })->name('user');
    // Route::get('/project', function () {
    //     return Inertia::render('Views/Projects');
    // })->name('project');
    // Route::get('/quotation', function () {
    //     return Inertia::render('Views/Quotation');
    // })->name('quotation');
    Route::get('/calendar', function () {
        return Inertia::render('Views/Calendar');
    })->name('calendar');
    // Route::get('/layout', function () {
    //     return Inertia::render('Views/Layout');
    // })->name('layout');
    // Route::get('/404', function () {
    //     return Inertia::render('Views/404');
    // })->name('404');
    Route::get('/Profile', function () {
        return Inertia::render('Views/Profile');
    })->name('Profile');
    // Route::get('/RTL', function () {
    //     return Inertia::render('Views/RTL');
    // })->name('RTL');

    // Route::get('/table', function () {
    //     return Inertia::render('Views/Tables');
    // })->name('table');


