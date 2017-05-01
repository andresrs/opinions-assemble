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

use App\Participant;
use Illuminate\Http\Request;

Route::get('/', 'MainController@index');
Route::get('/main', 'MainController@main');
Route::post('/main/login', 'MainController@login');
Route::post('/main/logout', 'MainController@logout');

Route::get('/vote', 'VoteController@show');
Route::post('/vote/store', 'VoteController@store');
Route::get('/vote/wait', 'VoteController@wait');

Route::get('/admin', 'AdminController@show');

Route::get('/admin/register', 'AdminController@register');
Route::post('/admin/verify', 'AdminController@verify');

Route::get('/admin/motion', 'AdminController@motionCreate');
Route::get('/admin/motion/active', 'AdminController@motionActive');
Route::post('/admin/motion/store', 'AdminController@motionStore');

Route::get('/admin/participant', 'AdminController@participantCreate');
Route::post('/admin/participant/store', 'AdminController@participantStore');

Route::get('/admin/generate', 'AdminController@generate');
Route::get('/admin/download', 'AdminController@download');
Route::get('/admin/reset', 'AdminController@resetData');

Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');
