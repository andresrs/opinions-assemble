<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateFiles;
use App\Motion;
use App\Participant;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class AdminController extends Controller
{
	function __construct() {
		$this->middleware('auth',[
			'except' => [
				'loginPage',
				'login',
			],
		]);
	}

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
		// Clearing user id in case it's in use
		session()->pull("user_code");

		DB::table('motions')->truncate();
		DB::table('participants')->truncate();
		DB::table('registered_votes')->truncate();
		DB::table('submitted_votes')->truncate();
		DB::table('users')->truncate();

		$finalFile = Storage::move('final_statistics.zip', 'prev/' . Carbon::now()->format('Ymd_Hi') . '.csv');

		return redirect('/admin/participant');
	}

	public function loginPage() {
		return view('user.login', [
			'loginUrl' => '/admin/login',
		]);
	}

	public function login() {
		if(!auth()->attempt(request(['email', 'password']))) {
			return back();
		}

		if(!is_null(auth()->user()->participant)) {
			session()->put("user_code", auth()->user()->participant->user_code);
		}

		return redirect('/admin/register');
	}

	public function logout() {
		auth()->logout();
		session()->pull("user_code");

		return redirect('/admin/login');
	}
}
