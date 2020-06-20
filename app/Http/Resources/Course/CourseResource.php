<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Topic\TopicResource;

class CourseResource extends JsonResource
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
            'instructor' => new InstructorResource($this->instructor),
            'name' => $this->name,
            'intro_link' => $this->intro_link,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'highlight_links' => $this->highlight_links,
            'testimonial_links' => $this->testimonial_links,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'type' => $this->type,
            'duration' => $this->duration,
            'price' => $this->price,
            'availablilty' => $this->availablilty,
            'modules' => ModuleResource::collection($this->modules),
            'participants' => ModuleResource::collection($this->courseParticipants),
        ];
    }
}
