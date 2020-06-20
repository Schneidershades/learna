<?php

namespace App\Http\Resources\Material;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Topic\TopicResource;

class MaterialResource extends JsonResource
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
            'id' => $this->materiable_id,
            'type' => $this->materiable_type,
            'link' => $this->intro_link,
            'upload' => $this->short_description,
        ];
    }
}