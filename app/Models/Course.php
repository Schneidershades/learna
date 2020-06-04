<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseCollection;

class Course extends Model
{
    public $oneItem = CourseResource::class;
    public $allItems = CourseCollection::class;
}
