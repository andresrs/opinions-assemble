<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motion;
use App\SubmittedVote;
use App\RegisteredVote;

class VoteController extends Controller
{
    public function show() {
		if(!session()->has('user_code')) {
			return redirect('/');
		}

		$motion = Motion::active()->first();

		if(is_null($motion) or $motion->registered->where('user_code', '=', session('user_code') )->count() ) {
			return redirect('/vote/wait');
		}

		return view('motion.vote', [
			'motion' => $motion,
			'all_motions' => Motion::latest()->get(),
		]);
	}

	public function store(Request $request) {
		if(!session()->has('user_code')) {
			return redirect('/');
		}

		SubmittedVote::create([
			'motion_id' => $request->motion_id,
			'vote_id' => $request->answer
		]);

		RegisteredVote::create([
			'user_code' => session('user_code'),
			'motion_id' => $request->motion_id,
			'ip_from' => $request->ip(),
		]);

		return redirect('/vote/wait');
	}

	public function wait() {
		if(!session()->has('user_code')) {
			return redirect('/');
		}

		$motion = Motion::active()->first();

		if(!(is_null($motion) or $motion->registered->where('user_code', '=', session('user_code') )->count() ) ){
			return redirect('/vote');
		}

		return view('motion.wait', [
			"message" => "Waiting for a motion to be available.",
			'all_motions' => Motion::latest()->get(),
		]);
	}
}
