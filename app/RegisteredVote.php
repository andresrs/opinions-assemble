<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredVote extends Model
{
    protected $fillable = [
		'user_code',
		'motion_id',
		'ip_from',
	];
}
