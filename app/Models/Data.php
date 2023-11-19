<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

	protected $fillable = ['t_id', 's_id', 'msg', 'file', 'file_content', 'sub_id'];
    public $timestamps = false;
	
}
