<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
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

		auth()->login($user);

		return redirect($url);
	}
}
