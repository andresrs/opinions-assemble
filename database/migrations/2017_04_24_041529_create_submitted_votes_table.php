<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmittedVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitted_votes', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('motion_id');
			$table->integer('vote_id');

			// Disabling it to reduce the chances of tying a participant with a vote.
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submitted_votes');
    }
}
