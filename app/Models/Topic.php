<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Topic;
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

    public function childTopics()
    {
    	return $this->hasMany(Topic::class, 'parent_topic_id');
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
