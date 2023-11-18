<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

	protected $fillable = ['sub_id', 't_id', 'c_id', 'name'];
    public $timestamps = false;
	
}