<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParticipantRequest;
use App\Http\Requests\VerifyParticipantRequest;
use App\Jobs\CreateParticipantsJob;
use App\Motion;
use App\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminParticipantController extends Controller
{
	function __construct() {
		$this->middleware('auth');
	}

    public function create() {
	    return view('participant.create');
	}

	public function store(CreateParticipantRequest $request) {
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
			'cnt_eligible' => Participant::all()->count(),
			'cnt_registered' => Participant::registered()->count(),
			'all_motions' => Motion::latest()->get(),
		]);
	}

	public function verify(VerifyParticipantRequest $request) {
		$view_params = [
			'search_id' => $request->user_code,
			'all_motions' => Motion::latest()->get(),
		];

		$participant = Participant::where('user_code', $request->user_code)->first();
		if($participant) {
			$participant->registered_on = Carbon::now();
			$participant->save();

			$view_params['participant'] = $participant;
		}

		return view('participant.verify', $view_params);
	}
}
