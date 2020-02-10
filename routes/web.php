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
/*
 * API Standard
 * message: ""
 * data : {}
 * status code
 */


Route::group(['prefix' => '/api/v1'],function (){
    /***** Authenticated Route *****/
    Route::group(['namespace'=> 'Backend'], function (){
        /***** Admin Route *****/
        Route::group(['namespace'=>'Admin'], function (){
            Route::get('/users', function (){
                return response()->json(\App\User::with('role')->get(), 200);
            });
            // Category list
            Route::get('/categories', 'CategoryController@index');
            // Category create
            Route::post('/categories', 'CategoryController@create');
            // Category view
            Route::get('/categories/{slug}', 'CategoryController@view');
            // Category view
            Route::put('/categories/{slug}', 'CategoryController@update');
            // Category Delete
            Route::delete('/categories/{slug}', 'CategoryController@delete');
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