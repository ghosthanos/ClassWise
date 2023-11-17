<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

	protected $fillable = ['s_id', 'msg', 'file', 'file_content'];
    public $timestamps = false;
	
}
