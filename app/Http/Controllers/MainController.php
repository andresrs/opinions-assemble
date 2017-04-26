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

	public function login(LogInMainRequest $request) {
		$participants = Participant::registered()->verify($request->user_id, $request->verification_code)->get();
		if(count($participants) <= 0) {
			session()->flash('error_message', "Please go to the registration table and verify your user id and verification code.");
			return redirect('/');
		}

		session()->put("user_id", $request->user_id);
		$participant = $participants[0];
		session()->put('hide_log_in', 1);
		return redirect('/vote');
	}

	public function logout(Request $request) {
		session()->pull("user_id");
		session()->pull("hide_log_in");
		return redirect('/');
	}
}
