<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'email',
    	'phone_number',
    	'address',
    	'city',
    	'state',
    	'zip',
    	'experience',
    	'cdl',
        'tenstreet',
    ];
}
