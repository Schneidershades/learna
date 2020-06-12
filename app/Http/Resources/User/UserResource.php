<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Instructor\IntructorResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'firstName' => $this->first_name,
            'otherName' => $this->other_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'verified' => $this->email_verified_at,
            'type' => $this->type,
            $this->mergeWhen($this->instructor != null, [
                'profile' => new InstructorResource($this->instructor),
            ]),
        ];
    }
}
