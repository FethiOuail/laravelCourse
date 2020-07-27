<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/anwar', function () {
    return 'hi how are you';
});



Route::get('/login', function () {
    return "Login";
})->name('login');


Route::get('/anwar/{id}', function ($id) {
    return $id;
});

Route::get('/test', function () {
    return "Welcome";
})->name('test-name');


Route::namespace('Front')->group(function () {

    // all route only access controller or method in folder name Front

    Route::get('users', 'UserController@showAdmin')->name('show-admin');

    Route::get('/index','UserController@getIndex');



});


/*Route::prefix('admins')->group(function () {
    Route::get('show', 'TestController@show');
    Route::get('edit', 'TestController@edit');
});*/


Route::group(['prefix' => 'admins'], function () {
    Route::get('show', 'TestController@show');
    Route::get('edit', 'TestController@edit');
});


Route::group(['namespace' => 'admin'], function() {

    Route::get('second', 'FirstController@showString');
    Route::get('second2', 'FirstController@showString2');
});


Route::resource('anwar','admin\AdminController');



Route::get('landing', function () {

    return view('landing');
});

Auth::routes(['verify' => true]);



Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/redirect/{service}', 'SocialController@redirect' );
Route::get('/callback/{service}', 'SocialController@callback' );

// ==================== Course 45 and >> ==========================



// ------------------ Method 1
//Route::get('offer', 'Front\CrudController@getOffers' );

// ------------------ Method 2 using namespace and group
Route::group(
    ['prefix' =>  LaravelLocalization::setLocale() ,
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ] ,function (){





    Route::group(['prefix' => 'offers', 'namespace' => 'Front'], function () {

        Route::get('offer', 'CrudController@getOffers');

        Route::get('create', 'CrudController@create')->name('offers.create');
        Route::post('store', 'CrudController@store')->name('offers.store');


        Route::get('edit/{id}', 'CrudController@editOffer')->name('offer.edit');
        Route::post('update/{id}', 'CrudController@updateOffer')->name('offers.update');
        Route::get('delete/{id}', 'CrudController@delete')->name('offer.delete');

        Route::get('allOffers','CrudController@getAllOffers')->name('offers.show');

    });

    Route::get('allOffersJson','Front\CrudController@getOfferJson');


    Route::get('youtube','Front\CrudController@getVideo');


});
