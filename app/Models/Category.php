<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryCollection;

class Category extends Model
{
    public $oneItem = CategoryResource::class;
    public $allItems = CategoryCollection::class;

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
