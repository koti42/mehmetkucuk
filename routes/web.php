<?php

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

Route::get('/', 'App\Http\Controllers\Frontend\DefaultController@index')->name('Frontend.index');

Route::namespace('Backend')->group(function () {
    Route::get('admin', 'DefaultController@index')->name('Backend.admin');
    Route::prefix('admin/settings')->group(function ()
    {

        Route::get('/', 'SettingsController@index')->name('Backend.AdminSettings');
        Route::post('', 'SettingsController@sortable')->name('Backend.sortable');
        Route::delete('delete/{id}', 'SettingsController@destroy')->name('company.destroy');
        Route::get('edit{id}', 'SettingsController@edit')->name('Backend.edit');
        Route::post('/{id}', 'SettingsController@update')->name('Backend.update');

    });

});


Route::namespace('Backend')->group(function() {
    Route::prefix('admin')->group(function(){
        Route::post('sortable','BlogController@sortable')->name('Blog.sortable');
        Route::resource('blog','BlogController');
    });
});
