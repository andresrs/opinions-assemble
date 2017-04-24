<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmittedVote extends Model
{
    protected $fillable = [
		'motion_id',
		'vote_id',
	];
}
