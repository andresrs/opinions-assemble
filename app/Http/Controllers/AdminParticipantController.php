<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminParticipantController extends Controller
{
    public function create() {
	    return view('participant.create');
	}

	public function store() {
		if (!$request->file('participants_file')->isValid()) {
			//TODO: Fill here
		}

		$participantsFile = $request->file('participants_file')->openFile();
		$request->file('participants_file')->storeAs('', 'participants.csv');

		session()->flash('job_queued', 'Uploading users. Wait several minutes to continue.');
		$this->dispatch(new CreateParticipantsJob());

		return redirect('/admin');
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
}
