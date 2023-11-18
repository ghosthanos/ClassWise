<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

	protected $fillable = ['s_id', 'name', 'c_id', 'password', 'email'];
    public $timestamps = false;
	
}

