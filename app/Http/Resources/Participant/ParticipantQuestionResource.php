<?php

namespace App\Http\Resources\Participant;

use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantQuestionResource extends JsonResource
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
            'question' => new ParticipantQuestionResource($this->question),
        ];
    }
}
