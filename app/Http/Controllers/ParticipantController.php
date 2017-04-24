<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParticipantRequest;
use App\Http\Requests\VerifyParticipantRequest;
use App\Participant;
use Carbon\Carbon;

class ParticipantController extends Controller {
	public function index() {
		return view('participant_verify');
	}

    public function create() {
	    return view('participant');
	}

	public function store(CreateParticipantRequest $request) {
		if ($request->file('participants_file')->isValid()) {
			//TODO: Fill here
		}

		$participantsFile = $request->file('participants_file')->openFile();
		$participantsFile->setFlags(\SplFileObject::READ_CSV);

		foreach($participantsFile as $participantData) {
			if(count($participantData) != 3) {
				continue;
			}

			Participant::create([
				'name'    => $participantData[0],
				'user_id' => $participantData[1],
				'email'   => $participantData[2],
				'verification_code' => random_int(100000, 999999),
				'registered_on' => null,
			]);
		}

		return redirect('/participant');
	}

	public function verifyShow() {
		return view('participant_verify');
	}

	public function verify(VerifyParticipantRequest $request) {
		$view_params = ['search_id' => $request->user_id,];

		$participant = Participant::where('user_id', $request->user_id)->first();
		if($participant) {
			$participant->registered_on = Carbon::now();
			$participant->save();

			$view_params['participant'] = $participant;
		}

		return view('participant_verify', $view_params);
	}
}
