<?php

namespace App\Http\Resources\Participant;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ParticipantQuizCollection extends ResourceCollection
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
            'data' => ParticipantQuizResource::collection($this->collection)
        ];
    }
}
