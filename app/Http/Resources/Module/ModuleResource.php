<?php

namespace App\Http\Resources\Module;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Topic\TopicResource;

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
            'materials' => ProjectResource::collection($this->materials),
            'quizes' => ProjectResource::collection($this->quiz),
        ];
    }
}
