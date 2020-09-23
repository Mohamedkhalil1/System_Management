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

Route::group(['namespace' =>'Admin','middleware' => 'auth:admin'], function () {
    ###########################################################################
    /* Languages Routes
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/','LanguagesController@index')->name('admin.languages');
        Route::get('/create','LanguagesController@create')->name('admin.languages.create');
        Route::post('/','LanguagesController@store')->name('admin.languages.store');
        Route::get('edit/{id}','LanguagesController@edit')->name('admin.languages.edit');
        Route::post('update/{id}','LanguagesController@update')->name('admin.languages.update');
        Route::get('delete/{id}','LanguagesController@destory')->name('admin.languages.destory');
    });
    /* end languages Routes */


    ###########################################################################
    /* Main Categories Routes 
    Route::group(['prefix' => 'main_categories'], function () {
        Route::get('/','MainCategoriesController@index')->name('admin.maincategories');
        Route::get('/create','MainCategoriesController@create')->name('admin.maincategories.create');
        Route::post('/','MainCategoriesController@store')->name('admin.maincategories.store');
        Route::get('edit/{id}','MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::post('update/{id}','MainCategoriesController@update')->name('admin.maincategories.update');
        Route::get('delete/{id}','MainCategoriesController@destory')->name('admin.maincategories.destory');
        Route::get('changeStatus/{id}','MainCategoriesController@changeStatus')->name('admin.maincategories.status');
    });
    /* end Main Categories Routes */

     ###########################################################################
    /* Main Vendors Routes 
    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/','VendorsController@index')->name('admin.vendors');
        Route::get('/create','VendorsController@create')->name('admin.vendors.create');
        Route::post('/','VendorsController@store')->name('admin.vendors.store');
        Route::get('edit/{id}','VendorsController@edit')->name('admin.vendors.edit');
        Route::post('update/{id}','VendorsController@update')->name('admin.vendors.update');
        Route::get('delete/{id}','VendorsController@destory')->name('admin.vendors.destory');
        Route::get('changeStatus/{id}','VendorsController@changeStatus')->name('admin.vendors.status');
    });
    /* end Vendors Routes */

    ###############################################################################
   
});



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

        });
       
        
   
        
});


