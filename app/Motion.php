<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Motion extends Model
{
    protected $fillable = [
		'proposal',
		'available_until',
	];

	protected $dates = [
		'available_until',
	];

	public function scopeActive($query) {
		return $query->where('available_until', ">", Carbon::now());
	}

	public function votes() {
		return $this->hasMany(SubmittedVote::class);
	}
}
