<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LogInMainRequest;
use App\Participant;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create() {
		return view('user.create');
	}

	public function store(CreateUserRequest $request) {
		$user = User::create([
			"name" => $request->name,
			"email" => $request->email,
			"password" => bcrypt($request->password),
		]);

		$url = '/';
		if(Participant::all()->count() == 0) {
			$url = '/admin/participant';
		}

		if(!auth()->check()) {
			auth()->login($user);
		}

		return redirect($url);
	}

	public function settings() {
		return view('user.settings');
	}

	public function settingsStore(LogInMainRequest $request) {
		$participant = Participant::registered()->verify($request->user_code, $request->verification_code)->first();

		$participant->user_id = auth()->user()->id;
		$participant->save();

		session()->put("user_code", $request->user_code);

		return redirect('/user/settings');
	}
}
