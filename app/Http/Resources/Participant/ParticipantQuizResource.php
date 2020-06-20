<?php

namespace App\Http\Resources\Participant;

use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantQuizResource extends JsonResource
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
            'quiz' => new ParticipantQuizResource($this->quiz),
        ];
    }
}
