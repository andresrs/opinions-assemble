<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motion;

class VoteController extends Controller
{
    public function show() {
		$motions = Motion::active()->get();

		//TODO: Handle when there is no active motion
		return view('motion.vote', [
			'motion' => $motions[0],
		]);
	}
}
