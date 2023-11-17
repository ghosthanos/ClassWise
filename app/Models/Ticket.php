<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'amount',
        'price',
        'user_id',
    ];

    public function event()
    {
        return $this->belongsTo(Events::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
