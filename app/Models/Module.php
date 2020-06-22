<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\Course;
use App\Models\ParticipantModule;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Module\ModuleResource;
use App\Http\Resources\Module\ModuleCollection;

class Module extends Model
{
    public $oneItem = ModuleResource::class;
    public $allItems = ModuleCollection::class;

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function topics()
    {
    	return $this->hasMany(Topic::class);
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

    public function participantModule()
    {
        return $this->hasMany(ParticipantModule::class);
    }
}
