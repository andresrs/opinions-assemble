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

Route::get('/participant', function () {
    return view('participant');
});

Route::post('/participant', function (Request $request) {
    $validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
		'email' => 'required|max:255',
		'user_id' => 'required|max:15',
	]);

	if ($validator->fails()) {
		return redirect('/')->withInput()->withErrors($validator);
	}

	Participant::create([
		'name' => $request->name,
		'email' => $request->email,
		'user_id' => $request->user_id,
		'code' => random_int(100000, 999999),
		'registered_on' => Carbon\Carbon::now(),
	]);

	return redirect('/participant');
});

Route::get('/participant_verify', function () {
    return view('participant_verify');
});

Route::post('/participant_verify', function (Request $request) {
    $validator = Validator::make($request->all(), [
		'user_id' => 'required|max:15',
	]);

	if ($validator->fails()) {
		return redirect('/')->withInput()->withErrors($validator);
	}

	$view_params = ['search_id' => $request->user_id,];

	$participant = Participant::where('user_id', $request->user_id)->first();
	if($participant) {
		$view_params['participant'] = $participant;
	}

    return view('participant_verify', $view_params);
});
