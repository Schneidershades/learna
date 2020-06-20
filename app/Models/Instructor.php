<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;
use App\Http\Resources\Instructor\InstructorResource;
use App\Http\Resources\Instructor\InstructorCollection;

class Instructor extends Model
{
    public $oneItem = InstructorResource::class;
    public $allItems = InstructorCollection::class;


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }

    public function quizzes()
    {
        return $this->morphMany(Project::class, 'quizable');
    }
}

