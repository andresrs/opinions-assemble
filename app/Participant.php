<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model {
    protected $fillable = [
		'name',
		'email',
		'user_id',
		'code',
		'registered_on',
	];
}
