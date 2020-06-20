<?php

namespace App\Http\Resources\Participant;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ParticipantTopicCollection extends ResourceCollection
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
            'data' => ParticipantTopicResource::collection($this->collection)
        ];
    }
}
