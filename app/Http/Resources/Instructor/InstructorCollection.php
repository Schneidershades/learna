<?php

namespace App\Http\Resources\Instructor;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InstructorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => InstructorResource::collection($this->collection)
        ];
    }
}
