<?php

namespace App\Jobs;

use App\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class CreateParticipantsJob implements ShouldQueue
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
        $participantsFile = new \SplFileObject(storage_path('app/participants.csv'));
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

		Storage::delete('participants.csv');
    }
}
