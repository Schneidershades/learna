<?php

namespace App\Traits\Points\Actions;

use App\Traits\Points\Models\Point;

abstract class ActionAbstract
{
    abstract public function key();

    public function getModel()
    {
        return Point::where('key', $this->key())->first();
    }
}
