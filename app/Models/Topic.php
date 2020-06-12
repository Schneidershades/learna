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


    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function childTopics()
    {
    	return $this->hasMany(Topic::class, 'parent_topic_id');
    }
}
