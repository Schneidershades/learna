<?php

namespace App\Traits\Points\Actions;

use App\Traits\Points\Actions\ActionAbstract;

class SolvedTopic extends ActionAbstract
{
    public function key()
    {
        return 'solved-topic';
    }
}
