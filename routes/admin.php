<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

define('PAGINATION_COUNT',10);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

        
    Route::group(['namespace' =>'Admin','prefix' =>'admin'], function () {
        Route::get('/login','LoginController@getLogin')->name('get.admin.login');
        Route::post('/login','LoginController@Login')->name('admin.login');
        Route::get('/logout','LoginController@Logout')->name('admin.logout');
    });


    Route::group(['namespace' =>'Admin','middleware' => 'auth:admin','prefix' =>'admin'], function () {
            Route::get('/', 'DashboardController@index')->name('admin.dashboard');

            ## Shipping Routes 
            Route::group(['prefix' => 'settings'], function () {
                Route::get('shipping-methods/{type}','SettingsController@editShippingMethod')->name('edit.shipping.methods');
                Route::post('shipping-methods/{id}','SettingsController@updateShippingMethod')->name('update.shipping.methods');
            });
            ## end Shipping Routes
            
             ## Branches Routes 
             Route::group(['namespace' =>'Branches','prefix' => 'branches'], function () {
                Route::get('/','BranchController@index')->name('admin.branches');
                Route::get('/create','BranchController@create')->name('admin.branches.create');
                Route::post('/','BranchController@store')->name('admin.branches.store');
                Route::get('/show/{id}','BranchController@show')->name('admin.branches.show');
                Route::get('/edit/{id}','BranchController@edit')->name('admin.branches.edit');
                Route::put('/{id}','BranchController@update')->name('admin.branches.update');
                Route::get('delete/{id}','BranchController@destroy')->name('admin.branches.delete');
            });
            ## end Branches Routes 

             ## Branches Routes 
             Route::group(['namespace' =>'Products','prefix' => 'products'], function () {
                Route::get('/','ProductController@index')->name('admin.products');
                Route::get('/create','ProductController@create')->name('admin.products.create');
                Route::post('/','ProductController@store')->name('admin.products.store');
                Route::get('/edit/{id}','ProductController@edit')->name('admin.products.edit');
                Route::put('/{id}','ProductController@update')->name('admin.products.update');
                Route::get('delete/{id}','ProductController@destroy')->name('admin.products.delete');
            });
            ## end Branches Routes 

        });
        
});


