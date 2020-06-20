<?php

namespace App\Models;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ParticipantQuestion extends Model
{
    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
