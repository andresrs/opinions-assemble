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

Route::get('/participant', 'ParticipantController@index');
Route::get('/participant/create', 'ParticipantController@create');
Route::post('/participant/store', 'ParticipantController@store');

Route::get('/participant/verify', 'ParticipantController@verifyShow');
Route::post('/participant/verify', 'ParticipantController@verify');

Route::get('/motion/create', 'MotionController@create');
Route::get('/motion/active', 'MotionController@active');
Route::post('/motion/store', 'MotionController@store');

Route::get('/vote', 'VoteController@show');
Route::post('/vote/store', 'VoteController@store');
Route::get('/vote/wait', 'VoteController@wait');

Route::get('/admin', 'AdminController@show');
Route::get('/admin/register', 'AdminController@register');
Route::post('/admin/verify', 'AdminController@verify');
