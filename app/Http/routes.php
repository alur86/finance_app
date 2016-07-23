<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::pattern('id', '[0-9]+');
Route::get('home', array('as' => 'home','uses' => 'HomeController@index'));
Route::get('load-bank/{id}', array ('as' => 'load-bank', 'uses' => 'HomeController@getLoadBankAccount'));
Route::post('postloadbank', array ('as' => 'postloadbank', 'uses' => 'HomeController@postLoaddBankAccount'));
Route::post('postmakepayment', array ('as' => 'postmakepayment', 'uses' => 'HomeController@postMakePayment'));
Route::post('postaddbank', array ('as' => 'postaddbank', 'uses' => 'HomeController@postAddBankAccount'));
Route::post('posteditbank', array ('as' => 'posteditbank', 'uses' => 'HomeController@postEditBankAccount'));
Route::get('make-payment/{id}', array ('as' => 'make-payment', 'uses' => 'HomeController@getMakePayment'));
Route::get('profile', array('as' => 'profile', 'uses' => 'ProfileController@profile'));
Route::get ('add-bank/{id}', array('as' => 'add-bank', 'uses' => 'HomeController@getAddBankAccount'));
Route::get ('edit-bank/{id}', array('as' => 'edit-bank', 'uses' => 'HomeController@getEditBankAccount'));
Route::get('history', array('as' => 'history', 'uses' => 'HomeController@history'));
Route::get('wallet', array('as' => 'wallet', 'uses' => 'HomeController@wallet'));
Route::get('profile-edit/{id}', array('as' => 'profile-edit', 'uses' => 'ProfileController@getProfileEdit'));
Route::post('postprofiledit', array('as' => 'postprofiledit', 'uses' => 'ProfileController@postProfileEdit'));


