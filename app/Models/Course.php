<?php

namespace App\Models;

use App\Models\Instructor;
use App\Models\Topic;
use App\Models\ParticipantCourse;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseCollection;

class Course extends Model
{
    public $oneItem = CourseResource::class;
    public $allItems = CourseCollection::class;

    public function instructor()
    {
    	return $this->belongsTo(Instructor::class);
    }

    public function topics()
    {
    	return $this->hasMany(Topic::class);
    }

    public function participantCourse()
    {
        return $this->hasMany(ParticipantCourse::class);
    }
}
