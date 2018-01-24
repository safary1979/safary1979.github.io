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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['auth']], function (){
    Route::resource('bunch', 'BunchController');
    Route::get('/', 'BunchController@index');
    Route::resource('/bunch/{id}/subscriber', 'SubscriberController',['except' => [  'store']]);
    Route::post('/bunch/{id}/subscriber/store', 'SubscriberController@store');
    Route::resource('template', 'TemplateController');
    Route::resource('campaign', 'CampaignController');
    Route::get('campaign/{id}/preview', 'CampaignController@preview');

});


Route::post('send', 'MailController@send');
