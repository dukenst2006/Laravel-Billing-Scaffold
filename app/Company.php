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

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function company_admin()
    {
    	
    }
}
