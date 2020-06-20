<?php

namespace App\Models;

use App\Models\Instructor;
use App\Models\Topic;
use App\Models\Category;
use App\Models\ParticipantCourse;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseCollection;

class Course extends Model
{
    public $oneItem = CourseResource::class;
    public $allItems = CourseCollection::class;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor()
    {
    	return $this->belongsTo(Instructor::class);
    }

    public function topics()
    {
    	return $this->hasMany(Topic::class);
    }

    public function participantCourses()
    {
        return $this->hasMany(ParticipantCourse::class);
    }

    public function projects()
    {
        return $this->morphMany(Project::class, 'projectable');
    }

    public function quizzes()
    {
        return $this->morphMany(Quiz::class, 'quizable');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
