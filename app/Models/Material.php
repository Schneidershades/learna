<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Material\MaterialResource;
use App\Http\Resources\Material\MaterialCollection;

class Material extends Model
{
    public $oneItem = MaterialResource::class;
    public $allItems = MaterialCollection::class;

    public function course()
    {
    	return $this->hasMany(Course::class);
    }

    public function topics()
    {
    	return $this->hasMany(Topic::class);
    }

    public function materable()
    {
        return $this->morphTo();
    }
}
