<?php

namespace App\Http\Resources\MultipleChoice;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MultipleChoiceCollection extends ResourceCollection
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
            'data' => MultipleChoiceResource::collection($this->collection)
        ];
    }
}
