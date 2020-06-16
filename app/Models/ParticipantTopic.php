<?php

namespace App\Models;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;

class ParticipantTopic extends Model
{
    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }
}
