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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/participant', 'ParticipantController@index');

Route::get('/participant/create', 'ParticipantController@create');

Route::post('/participant/store', 'ParticipantController@store');

Route::get('/participant/verify', 'ParticipantController@verifyShow');
Route::post('/participant/verify', 'ParticipantController@verify');
