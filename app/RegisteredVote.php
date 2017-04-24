<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredVote extends Model
{
    protected $fillable = [
		'user_id',
		'motion_id',
		'ip_from',
	];
}
