<?php

namespace App\Traits\Points;

use Exception;
use App\Traits\Points\Models\Point;
use App\Traits\Points\Actions\ActionAbstract;
use App\Traits\Points\Formatters\PointsFormatter;

trait CollectsPoints
{
    public function givePoints(ActionAbstract $action)
    {
        if (!$model = $action->getModel()) {
            throw new Exception("Points Model for key [{$action->key()}] not found");
        }

        $this->pointsRelation()->attach($action->getModel());
    }

    public function points()
    {
        return new PointsFormatter(
            $this->pointsRelation->sum('points')
        );
    }

    public function pointsRelation()
    {
        return $this->belongsToMany(Point::class)->withTimestamps();
    }
}
