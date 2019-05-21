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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
})->name('services');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/team', function () {
    return view('team');
})->name('team');
Route::get('/news', function () {
    return view('news');
})->name('news');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Regular Police Employee Routes*/
Route::group(['middleware' => 'auth', 'employeeAccess'], function () {
    Route::get('/citizens', 'CitizensController@index')->name('citizenLookup');
    Route::post('citizens', 'CitizensController@index2')->name('citizenSearch');
});
