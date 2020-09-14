<?php

use Illuminate\Support\Facades\Route;
use App\User;
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

// Route::resource('/cruds','CrudsController',[
//     'except'=>['edit','show','store']
// ]);

Route::get('/','PostsController@index');


Auth::routes();
Route::post('/profile/follow/{user}','FollowsController@store');
//index homepage
// Route::get('/profile', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile');
//Create posts
Route::get('/posts/create', 'PostsController@create');
//not a page rather proccess
Route::post('/posts/{user}/store', 'PostsController@store');
//show selected image with some data
Route::get('/posts/{post}', 'PostsController@show');
//show edit profile
Route::get('/profile/{user}/edit', 'ProfilesController@edit');
//process after save
Route::put('/profile/{user}/update', 'ProfilesController@update');








