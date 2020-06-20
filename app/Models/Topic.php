<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Topic;
use App\Models\ParticipantTopic;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Topic\TopicResource;
use App\Http\Resources\Topic\TopicCollection;

class Topic extends Model
{
    public $oneItem = TopicResource::class;
    public $allItems = TopicCollection::class;


    public function module()
    {
    	return $this->belongsTo(Module::class);
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

    public function participantTopics()
    {
        return $this->hasMany(ParticipantTopic::class);
    }
}
