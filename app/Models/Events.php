<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Events extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'start_time', 'venue', 'user_id','ticket_price'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value
            ? Carbon::createFromFormat('Y-m-d', $value)->toDateString()
            : null;
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id');
    }
}

