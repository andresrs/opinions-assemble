<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParticipantRequest;
use App\Http\Requests\VerifyParticipantRequest;
use App\Http\Requests\VerifyMotionRequest;
use App\Jobs\CreateParticipantsJob;
use App\Jobs\GenerateFiles;
use App\Participant;
use App\Motion;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class AdminController extends Controller
{
    public function show() {
		if((Participant::all()->count() == 0) and !session()->has('job_queued')) {
			return redirect('/admin/participant');
		}

		$motion = Motion::active()->first();

		$view = 'admin.show';
		if(is_null($motion)) {
			$view = 'admin.ending';
		}

		$file_ready = false;
		if(Storage::exists('final_statistics.zip')) {
			$file_ready = true;
		}

		return view($view, [
			'all_motions' => Motion::latest()->get(),
			'file_ready' => $file_ready,
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
		$motion = Motion::active()->first();

		if(!is_null($motion)) {
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

    public function participantCreate() {
	    return view('participant.create');
	}

	public function participantStore(CreateParticipantRequest $request) {
		if (!$request->file('participants_file')->isValid()) {
			//TODO: Fill here
		}

		$participantsFile = $request->file('participants_file')->openFile();
		$request->file('participants_file')->storeAs('', 'participants.csv');

		session()->flash('job_queued', 'Uploading users. Wait several minutes to continue.');
		$this->dispatch(new CreateParticipantsJob());

		return redirect('/admin');
	}

	public function generate() {
		session()->flash('job_queued', 'Generating final files. Wait several minutes to continue.');
		$this->dispatch(new GenerateFiles());

		return redirect('/admin');
	}

	public function download() {
		$finalFile = Storage::get('final_statistics.zip');

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=final_statistics.zip');
		header('Content-Transfer-Encoding: binary');
		header('Connection: Keep-Alive');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . strlen($finalFile));

		print $finalFile;
		exit;
	}

	public function resetData() {
		DB::table('motions')->truncate();
		DB::table('participants')->truncate();
		DB::table('registered_votes')->truncate();
		DB::table('submitted_votes')->truncate();

		$finalFile = Storage::move('final_statistics.zip', 'prev/' . Carbon::now()->format('Ymd_Hi') . '.csv');

		return redirect('/admin/participant');
	}
}
