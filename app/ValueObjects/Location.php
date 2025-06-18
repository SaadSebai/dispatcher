<?php

namespace App\ValueObjects;

class Location
{
    protected float $lng;
    protected float $lat;

    /**
     * @param  float  $lng
     * @param  float  $lat
     */
    public function __construct(float $lng, float $lat)
    {
        $this->lng = $lng;
        $this->lat = $lat;
    }

    public function getLng(): float
    {
        return $this->lng;
    }

    public function setLng(float $lng): void
    {
        $this->lng = $lng;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }
}
