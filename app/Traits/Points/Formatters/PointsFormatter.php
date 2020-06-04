<?php

namespace App\Traits\Points\Formatters;

class PointsFormatter
{
    protected $points;


    public function __construct($points)
    {
        $this->points = $points;
    }

    public function value()
    {
        return $this->points;
    }

    public function number()
    {
        return number_format($this->value());
    }

    public function shorthand()
    {
        $points = $this->value();

        if ($points === 0) {
            return 0;
        }

        switch ($points) {
            case $points < 1000:
                return number_format($points);
                break;

            case $points < 1000000:
                return sprintf(
                    '%sk',
                    (float) number_format($points / 1000, 1)
                );
                break;

            case $points < 10000000:
                return sprintf(
                    '%sm',
                    (float) number_format($points / 1000000, 1)
                );
                break;

            default:
            
                return;
        }
    }
}
