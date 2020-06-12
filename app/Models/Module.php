<?php

namespace App\Models;

use App\Models\Topic:
use App\Models\Course:
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function topics()
    {
    	return $this->hasMany(Topics::class);
    }
}
