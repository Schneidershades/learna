<?php

namespace App\Http\Resources\Topic;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Material\MaterialResource;
use App\Http\Resources\Quiz\QuizResource;

class TopicResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'seconds' => $this->seconds,
            'projects' => ProjectResource::collection($this->projects),
            'materials' => MaterialResource::collection($this->materials),
            'quizes' => QuizResource::collection($this->quiz),
        ];
    }
}