<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\VerifyMotionRequest;
use App\Motion;
use App\Participant;

class MotionController extends Controller
{
    public function create() {
		$motions = Motion::active()->get();

		if(count($motions) > 0) {
			return redirect('/motion/active');
		}

		return view('motion.create', [
			'all_motions' => Motion::latest()->get(),
		]);
	}

	public function store(VerifyMotionRequest $request) {
		$motion = Motion::create([
			'proposal' => $request->proposal,
			'proposal_short' => $request->proposal_short,
			'available_until' => Carbon::now()->addMinutes(20),
		]);

		return redirect('/motion/active');
	}

	public function active() {
		$motion = Motion::active()->first();

		if(!$motion) {
			return redirect('/motion/create');
		}

		$participants_total = Participant::count();
		$participants_registered = Participant::registered()->count();

		return view('motion.active', [
			'motion' => $motion,
			'all_motions' => Motion::latest()->get(),
			'votes' => $motion->votes->count(),
			'participants_total' => $participants_total,
			'participants_registered' => $participants_registered,
		]);
	}
}
