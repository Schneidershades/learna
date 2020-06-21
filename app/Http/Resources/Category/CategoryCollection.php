<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
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
            'data' => CategoryResource::collection($this->collection)
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'catName' => 'name',
            'catSlug' => 'slug',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'name' => 'catName',
            'slug' => 'catSlug',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
