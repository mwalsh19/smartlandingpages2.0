<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
}
