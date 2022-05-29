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


    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index')->name('home.index');

    // Route::group(['middleware' => ['guest']], function() {

    //     //login views

    //     /**
    //      * Register Routes
    //      */
    //     Route::get('/register', 'RegisterController@show')->name('register.show');
    //     Route::post('/register', 'RegisterController@register')->name('register.perform')->middleware('verified');

    //     /**
    //      * Login Routes
    //      */
    //     Route::post('/login', 'LoginController@login')->name('login.perform');

    // });

    // Route::group(['middleware' => ['auth']], function() {
    //     /**
    //      * Logout Routes
    //      */
    // });

    // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    Route::get('/sign-in', function () {
        return Inertia::render('Views/Sign-In');
    });

    Route::get('/sign-up', function () {
        return Inertia::render('Views/Sign-Up');
    });
    Route::get('/verify', function () {
        return Inertia::render('Views/EmailVerify');
    })->name('email.verify');


    Route::get('/dashboard', function () {
        return Inertia::render('Views/Dashboard');
    });
    Route::get('/project', function () {
        return Inertia::render('Views/Projects');
    });
    Route::get('/quotation', function () {
        return Inertia::render('Views/Quotation');
    });
    Route::get('/calendar', function () {
        return Inertia::render('Views/Calendar');
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

    Route::get('/table', function () {
        return Inertia::render('Views/Tables');
    });


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
