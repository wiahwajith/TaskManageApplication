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
//>>>>>>>>>>>> **** .... C L I E N T ...... **** <<<<<<<<<<<<

Route::prefix('employee')->name('emp.')->group(function () {

    Route::get('/', 'EmployeeController@index')->name('dashboard');


});


