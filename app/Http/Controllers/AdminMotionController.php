<?php

namespace App\Http\Controllers;

use App\Motion;
use App\Participant;
use App\Http\Requests\VerifyMotionRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminMotionController extends Controller
{
    public function create() {
		$motion = Motion::active()->first();

		if(!is_null($motion)) {
			return redirect('/admin/motion/active');
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

		return redirect('/admin/motion/active');
	}

	public function active() {
		$motion = Motion::active()->first();

		if(!$motion) {
			return redirect('/admin/motion');
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
