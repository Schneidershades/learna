<?php

namespace App\Models;

use App\Models\MultipleChoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ParticipantMultipleChoice extends Model
{
    public function choice()
    {
    	return $this->belongsTo(MultipleChoice::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
