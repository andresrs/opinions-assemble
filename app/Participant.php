<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model {
    protected $fillable = [
		'name',
		'email',
		'user_code',
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

	public function scopeVerify($query, $user_code, $verification_code){
		return $query->where('user_code', '=', $user_code)->where('verification_code', '=', $verification_code);
	}

	public function scopeGetUser($query, $user_code) {
		return $query->where('user_code', '=', $user_code);
	}
}
