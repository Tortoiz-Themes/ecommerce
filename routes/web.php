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
    return view('welcome');
});
Auth::routes();


/******************************
 * All Backend Route Goes Here
 *****************************/
Route::group(['as' => 'backend.','prefix'=>'backend','namespace'=>'Backend','middleware'=>'auth'],function (){
    /*** Route For Admin ***/
    Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'], function (){
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        /** Category Route **/
        Route::resource('/category', 'CategoryController');
    });
    /*** Route For Customer ***/
    Route::group(['as'=>'customer.','prefix'=>'customer','namespace'=>'Customer','middleware'=>'customer'],
        function (){

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });
});

