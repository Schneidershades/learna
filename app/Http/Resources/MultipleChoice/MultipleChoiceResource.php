<?php

namespace App\Http\Resources\MultipleChoice;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Question\QuestionResource;

class MultipleChoiceResource extends JsonResource
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
            'question' => new QuestionResource($this->course),
            'option' => $this->option,
            'correct_answer' => $this->correct_answer,
        ];
    }
}
