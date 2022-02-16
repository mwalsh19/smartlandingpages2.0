<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
    	'name',
    	'logo',
    	'description',
    	'color_scheme_headline',
    	'color_scheme_sub_headline',
    	'color_scheme_body_copy',
    	'color_scheme_accent',
    ];
}
