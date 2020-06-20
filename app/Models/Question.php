<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Question\QuestionResource;
use App\Http\Resources\Question\QuestionCollection;

class Question extends Model
{
    public $oneItem = QuestionResource::class;
    public $allItems = QuestionCollection::class;

}
