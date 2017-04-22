<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model {
    protected $fillable = [
		'name',
		'email',
		'user_id',
		'registered_on',
	];

	protected $dates = [
		'registered_on',
	];
}
