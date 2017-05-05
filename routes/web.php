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
Route::get('/main/login', 'MainController@loginPage');
Route::post('/main/login', 'MainController@login');
Route::get('/main/logout', 'MainController@logout');

Route::get('/vote', 'VoteController@show');
Route::post('/vote/store', 'VoteController@store');
Route::get('/vote/wait', 'VoteController@wait');

Route::get('/admin', 'AdminController@show');

Route::get('/admin/register', 'AdminParticipantController@register');
Route::post('/admin/register', 'AdminParticipantController@verify');

Route::get('/admin/motion', 'AdminMotionController@create');
Route::get('/admin/motion/active', 'AdminMotionController@active');
Route::post('/admin/motion/store', 'AdminMotionController@store');

Route::get('/admin/participant', 'AdminParticipantController@create');
Route::post('/admin/participant/store', 'AdminParticipantController@store');

Route::get('/admin/login', 'AdminController@loginPage')->name('login');
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin/generate', 'AdminController@generate');
Route::get('/admin/download', 'AdminController@download');
Route::get('/admin/reset', 'AdminController@resetData');

Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');
