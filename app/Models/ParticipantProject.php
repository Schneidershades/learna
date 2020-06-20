<?php

namespace App\Models;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ParticipantProject extends Model
{
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
