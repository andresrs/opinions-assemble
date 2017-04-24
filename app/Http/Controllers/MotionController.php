<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\VerifyMotionRequest;
use App\Motion;

class MotionController extends Controller
{
    public function create() {
		return view('motion.create');
	}

	public function store(VerifyMotionRequest $request) {
		$motion = Motion::create([
			'proposal' => $request->proposal,
			'available_until' => Carbon::now()->addMinutes(20),
		]);

		//return redirect('/motion/active');
		return view('motion.active', [
			'motion' => $motion,
		]);
	}
}
