<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\ProjectCollection;
use App\Models\ParticipantQuestion;

class Project extends Model
{
    public $oneItem = ProjectResource::class;
    public $allItems = ProjectCollection::class;

    public function projectable()
    {
        return $this->morphTo();
    }

    public function quizzes()
    {
        return $this->morphMany(Project::class, 'quizable');
    }

    public function participantProjects()
    {
        return $this->hasMany(ParticipantProject::class);
    }

}
