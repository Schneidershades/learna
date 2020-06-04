<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\ProjectCollection;

class Project extends Model
{
    public $oneItem = ProjectResource::class;
    public $allItems = ProjectCollection::class;
}
