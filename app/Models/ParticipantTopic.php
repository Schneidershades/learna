<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ParticipantTopic extends Model
{
    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
