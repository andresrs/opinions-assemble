<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateParticipantRequest;
use App\Http\Requests\VerifyParticipantRequest;
use App\Participant;

class ParticipantController extends Controller {
	public function index() {
		return view('participant_verify');
	}

    public function create() {
	    return view('participant');
	}

	public function store(CreateParticipantRequest $request) {
		$participant = Participant::create([
			'name' => $request->name,
			'email' => $request->email,
			'user_id' => $request->user_id,
			'registered_on' => null,
		]);

		$participant->verification_code = random_int(100000, 999999);
		$participant->save();

		return redirect('/participant');
	}

	public function verifyShow() {
		return view('participant_verify');
	}

	public function verify(VerifyParticipantRequest $request) {
		$view_params = ['search_id' => $request->user_id,];

		$participant = Participant::where('user_id', $request->user_id)->first();
		if($participant) {
			$view_params['participant'] = $participant;
		}

		return view('participant_verify', $view_params);
	}
}
