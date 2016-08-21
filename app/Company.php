<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $fillable = [
		'name',
		'address',
		'address2',
		'city',
		'state',
		'zip',
		'logo',
		'url',
		'main_phone',
	];

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
