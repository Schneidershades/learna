<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Instructor\InstructorResource;
use App\Http\Resources\Instructor\InstructorCollection;

class Instructor extends Model
{
    public $oneItem = InstructorResource::class;
    public $allItems = InstructorCollection::class;

    public function getRouteKeyName()
    {
    	return 'user_id';
    }
}
