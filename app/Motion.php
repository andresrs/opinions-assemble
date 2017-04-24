<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motion extends Model
{
    protected $fillable = [
		'proposal',
		'available_until',
	];

	protected $dates = [
		'available_until',
	];
}
