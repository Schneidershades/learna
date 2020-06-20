<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Quiz\QuizResource;
use App\Http\Resources\Quiz\QuizCollection;
use App\Models\ParticipantQuiz;

class Quiz extends Model
{
    public $oneItem = QuizResource::class;
    public $allItems = QuizCollection::class;

    public function quizable()
    {
        return $this->morphTo();
    }

    public function participantQuizzes()
    {
        return $this->hasMany(ParticipantQuiz::class);
    }
}
