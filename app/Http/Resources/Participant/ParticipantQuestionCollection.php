<?php

namespace App\Http\Resources\Participant;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ParticipantQuestionCollection extends ResourceCollection
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
            'data' => ParticipantQuestionResource::collection($this->collection)
        ];
    }
}
