<?php

namespace App\Http\Resources\Module;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Topic\TopicResource;
use App\Http\Resources\Quiz\QuizResource;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Material\MaterialResource;

class ModuleResource extends JsonResource
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
            'topics' => TopicResource::collection($this->topics),
            'projects' => ProjectResource::collection($this->projects),
            'materials' => MaterialResource::collection($this->materials),
            'quizzes' => QuizResource::collection($this->quiz),
        ];
    }
}
