<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\Currency\CurrencyCollection;

class Currency extends Model
{
    public $oneItem = CurrencyResource::class;
    public $allItems = CurrencyCollection::class;
}
