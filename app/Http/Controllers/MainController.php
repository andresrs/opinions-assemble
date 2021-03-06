<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogInMainRequest;
use App\Participant;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
		return view('layouts.home');
	}

	public function loginPage() {
		return view('user.login', [
			'loginName' => 'User ID',
			'loginField' => 'user_code',
			'loginUrl' => '/main/login',
			'passName' => 'Code',
			'passField' => 'verification_code',
		]);
	}

	public function login(LogInMainRequest $request) {
		$participants = Participant::registered()->verify($request->user_code, $request->verification_code)->get();
		if(count($participants) <= 0) {
			return redirect('/')->with('error_message', 'Please go to the registration table and verify your user id and verification code.');
		}

		session()->put("user_code", $request->user_code);
		$participant = $participants[0];
		return redirect('/vote');
	}

	public function logout(Request $request) {
		session()->pull("user_code");
		return redirect('/');
	}
}
