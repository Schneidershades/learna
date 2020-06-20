<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\MultpleChoice\MultpleChoiceResource;
use App\Http\Resources\MultpleChoice\MultpleChoiceCollection;

class MultipleChoice extends Model
{
    public $oneItem = MultpleChoiceResource::class;
    public $allItems = MultpleChoiceCollection::class;

    public function participants()
    {
    	return $this->hasMany(ParticipantMultipleChoice::class);
    }
}
