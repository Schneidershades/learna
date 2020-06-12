<?php

namespace App\Http\Resources\Question;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Quiz\QuizResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'quiz' => new QuizResource($this->quiz),
            'question' => $this->question,
            'essay' => $this->essay,
            'answer' => $this->answer,
            'points' => $this->points,
        ];
    }
}