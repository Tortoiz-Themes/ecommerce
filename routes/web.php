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
        Route::get('/{route}','DashboardController@index')->where('route', '[\/\w\.-]*');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        /** Category Route **/
        //Route::resource('/category', 'CategoryController');
    });
    /*** Route For Customer ***/
    Route::group(['as'=>'customer.','prefix'=>'customer','namespace'=>'Customer','middleware'=>'customer'],
        function (){
            Route::get('/{route}','DashboardController@index')->where('route', '[\/\w\.-]*');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });
});

/******************************
 * Froent API Route Goes Here
 *****************************/
Route::group(['prefix' => '/api/v1'],function (){
    /***** Authenticated Route *****/
    Route::group(['middleware' => 'auth', 'namespace'=> 'Backend'], function (){
        /***** Admin Route *****/
        Route::group(['middleware'=>'admin', 'namespace'=>'Admin'], function (){
            Route::get('/users', function (){
                return response()->json(\App\User::with('role')->get(), 200);
            });

        });
        /***** Customer Route *****/
        Route::group(['middleware'=>'customer', 'namespace'=>'Customer'], function (){

        });
        /***** Common Route *****/
        Route::get('/me', function (){
            return response()->json(auth()->user(), 200);
        });
    });
    /***** Public Route *****/
});