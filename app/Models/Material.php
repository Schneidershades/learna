<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Material\MaterialResource;
use App\Http\Resources\Material\MaterialCollection;

class Material extends Model
{
    public $oneItem = MaterialResource::class;
    public $allItems = MaterialCollection::class;
}
