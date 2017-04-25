<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motion;
use App\SubmittedVote;
use App\RegisteredVote;

class VoteController extends Controller
{
    public function show() {
		$motion = Motion::active()->first();
		$all_motions = Motion::all();

		if(is_null($motion)) {
			return redirect('/vote/wait');
		}
		return view('motion.vote', [
			'motion' => $motion,
			'all_motions' => $all_motions,
		]);
	}

	public function store(Request $request) {
		SubmittedVote::create([
			'motion_id' => $request->motion_id,
			'vote_id' => $request->answer
		]);

		RegisteredVote::create([
			'user_id' => session('user_id'),
			'motion_id' => $request->motion_id,
			'ip_from' => $request->ip(),
		]);

		return redirect('/vote/wait');
	}

	public function wait() {}
}
