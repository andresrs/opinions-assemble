<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\User;
use Illuminate\Http\Request;

class InstallerController extends Controller
{
    public function welcome() {
		return view('installer.welcome');
	}

	public function user() {
		return view('user.create', [
			'loginUrl' => 'install/user',
			'text' => 'Hello world',
		]);
	}

	public function userStore(CreateUserRequest $request) {
		$user = User::create([
			"name" => $request->name,
			"email" => $request->email,
			"password" => bcrypt($request->password),
		]);

		auth()->login($user);

		return redirect('/admin/');
	}
}
