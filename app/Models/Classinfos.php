<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classinfos extends Model
{
    use HasFactory;

	protected $fillable = ['c_id', 'name'];
    public $timestamps = false;
	
}
