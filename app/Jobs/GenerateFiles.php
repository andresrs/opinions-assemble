<?php

namespace App\Jobs;

use App\Participant;
use App\Motion;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateFiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		$participantsFilename = tempnam(sys_get_temp_dir(), 'P');
		$motionsFilename = tempnam(sys_get_temp_dir(), 'M');

		$participantsFile = fopen($participantsFilename, "w");
		$motionsFile = fopen($motionsFilename, "w");

		$participants = Participant::all();

		fputcsv($participantsFile, ['Name', 'Registered On']);
		foreach($participants as $p) {
			$date = '-';
			if(!is_null($p->registered_on)) {
				$date = $p->registered_on->toFormattedDateString();
			}
			fputcsv($participantsFile, [$p->name, $date]);
		}

		$motions = Motion::all();

		fputcsv($motionsFile, ['Motion Short Title', 'Yes', 'No']);
		foreach($motions as $m) {
			fputcsv($motionsFile, [
				$m->proposal_short,
				$m->votes->where('vote_id', '=', '1')->count(),
				$m->votes->where('vote_id', '=', '0')->count(),
			]);
		}

		fclose($participantsFile);
		fclose($motionsFile);

		$zipname = tempnam(sys_get_temp_dir(), 'ZA');
		$zip = new ZipArchive;
		$zip->open($zipname, ZipArchive::CREATE);
		$zip->addFile($participantsFilename, 'participants.csv');
		$zip->addFile($motionsFilename, 'motions.csv');
		$zip->close();

		Storage::putFileAs('', new File($zipname), 'final_statistics.zip');
    }
}
