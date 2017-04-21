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

	$participant = new Participant;
	$participant->name = $request->name;
	$participant->email = $request->email;
	$participant->user_id = $request->user_id;
	$participant->code = random_int(100000, 999999);

	$participant->save();

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

	$participants = DB::select("select * from participants where user_id = :user_id", ['user_id' => $request->user_id]);
	$participant = 0;
	if(count($participants) > 0) {
		$view_params['participant'] = $participants[0];
	}

    return view('participant_verify', $view_params);
});
