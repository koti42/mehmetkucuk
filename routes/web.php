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






Route::namespace('Frontend')->group(function () {
    Route::get('/','DefaultController@index')->name('home.Index');

    //BLOG
    Route::get('/blog','BlogController@index')->name('blog.Index');
    Route::get('/blog/{slug}','BlogController@detail')->name('blog.Detail');



    //PAGE
    Route::get('/page/{slug}','PageController@detail')->name('page.Detail');

    //CONTACT
    Route::get('/contact','DefaultController@contact')->name('contact.Detail');
    Route::post('/contact','DefaultController@sendMail');

});















Route::namespace('Backend')->group(function () {
    Route::get('admin', 'DefaultController@index')->name('Backend.Admin')->middleware('Admin');


    Route::middleware(['Admin'])->group(function () {
        Route::prefix('admin/settings')->group(function () {

            Route::get('/', 'SettingsController@index')->name('Backend.AdminSettings');
            Route::post('', 'SettingsController@sortable')->name('Backend.sortable');
            Route::delete('delete/{id}', 'SettingsController@destroy')->name('company.destroy');
            Route::get('edit{id}', 'SettingsController@edit')->name('Backend.edit');
            Route::post('/{id}', 'SettingsController@update')->name('Backend.update');


        });
    });

});
//LOGIN


Route::namespace('Backend')->group(function () {


        Route::prefix('Admin')->group(function () {
        Route::get('/login', 'DefaultController@login')->name('admin.login')->middleware('CheckLogin');
        Route::get('/logout', 'DefaultController@logout')->name('admin.Logout');
        Route::post('/login', 'DefaultController@authenticate')->name('admin.Authenticate');
        Route::post('/','DefaultController@sendMail2');



        Route::middleware(['Admin'])->group(function () {
            //BLOG
            Route::post('/blog/sortable', 'BlogController@sortable')->name('Blog.sortable');
            Route::resource('blog', 'BlogController');
            //PAGE
            Route::post('/Pages/sortable', 'PageController@sortable')->name('page.Sortable');
            Route::resource('Pages', 'PageController');

            //SLIDER
            Route::post('/slider/sortable', 'SliderController@sortable')->name('slider.Sortable');
            Route::resource('slider', 'SliderController');


            //ADMIN
            Route::post('/user/sortable', 'UserController@sortable')->name('user.Sortable');
            Route::resource('user', 'UserController');
            //MAİNPAGE
            Route::resource('/Profiles/', 'ProfilController');



        });
    });
});
