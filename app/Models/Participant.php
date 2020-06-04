<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Participant\ParticipantResource;
use App\Http\Resources\Participant\ParticipantCollection;

class Participant extends Model
{
    public $oneItem = ParticipantResource::class;
    public $allItems = ParticipantCollection::class;
}
