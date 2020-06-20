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

    public function projects()
    {
        return $this->morphMany(Project::class, 'projectable');
    }

    public function quizzes()
    {
        return $this->morphMany(Quiz::class, 'quizable');
    }

    public function materials()
    {
        return $this->morphMany(Material::class, 'materiable');
    }
}
