<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Topic\TopicResource;

class ProjectResource extends JsonResource
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
            'id' => $this->projectable_id,
            'type' => $this->projectable_type,
            'name' => $this->name,
            'description' => $this->description,
            'deadline' => $this->deadline,
            'points' => $this->points,
        ];
    }
}
