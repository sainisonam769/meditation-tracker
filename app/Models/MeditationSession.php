<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeditationSession extends Model
{
     protected $fillable = [
    'user_id',
    'session_date',
    'duration',
    'notes'
    ];

    public function user()
    {
     return $this->belongsTo(User::class);
    }
}
