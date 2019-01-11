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

Auth::routes();

// these routes send the user to functions in the HomeController
Route::get('/', 'HomeController@home')->name('home');
Route::get('/profilepage', 'HomeController@dashboard')->name('profilepage');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/hungergames', 'HomeController@hungergames')->name('hungergames');

// Route::get('insert','StudInsertController@insertform');
// these routes send the user to functions in the UserModel
Route::post('/naam','UserModelController@storenaam');
Route::post('/bio','UserModelController@storebio');
Route::post('/profilepic','UserModelController@uploadprofilepic');
Route::post('/backgroundpic','UserModelController@uploadbackgroundpic');
Route::post('/updatescore','UserModelController@gameupdate');