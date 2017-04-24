<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model {
    protected $fillable = [
		'name',
		'email',
		'user_id',
		'verification_code',
		'registered_on',
	];

	protected $dates = [
		'registered_on',
	];

	public function scopeRegistered($query) {
		return $query->whereNotNull('registered_on');
	}
}
