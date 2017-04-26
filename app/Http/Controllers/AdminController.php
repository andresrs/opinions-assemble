<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParticipantRequest;
use App\Http\Requests\VerifyParticipantRequest;
use App\Http\Requests\VerifyMotionRequest;
use App\Participant;
use App\Motion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show() {
		return view('admin.show', [
			'all_motions' => Motion::latest()->get(),
		]);
	}

	public function register() {
		return view('participant.verify', [
			'all_motions' => Motion::latest()->get(),
		]);
	}

	public function verify(VerifyParticipantRequest $request) {
		$view_params = [
			'search_id' => $request->user_id,
			'all_motions' => Motion::latest()->get(),
		];

		$participant = Participant::where('user_id', $request->user_id)->first();
		if($participant) {
			$participant->registered_on = Carbon::now();
			$participant->save();

			$view_params['participant'] = $participant;
		}

		return view('participant.verify', $view_params);
	}

    public function motionCreate() {
		$motions = Motion::active()->get();

		if(count($motions) > 0) {
			return redirect('/admin/motion/active');
		}

		return view('motion.create', [
			'all_motions' => Motion::latest()->get(),
		]);
	}

	public function motionStore(VerifyMotionRequest $request) {
		$motion = Motion::create([
			'proposal' => $request->proposal,
			'proposal_short' => $request->proposal_short,
			'available_until' => Carbon::now()->addMinutes(20),
		]);

		return redirect('/admin/motion/active');
	}

	public function motionActive() {
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
