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
			'text' => '<p>This account will allow you to administer the system. You will be able to register create motions, and '.
						'view the results when the voting ends.</p><p>You can also create more accounts </p>',
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
