<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Topic\TopicResource;
use App\Http\Resources\Topic\TopicCollection;

class Topic extends Model
{
    public $oneItem = TopicResource::class;
    public $allItems = TopicCollection::class;
}
