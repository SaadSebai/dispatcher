<?php

namespace App\Services;

use App\Models\Driver;
use App\ValueObjects\Location;

class Dispatcher
{
    public function assignToDriver(Location $pickupLocation): ?Driver
    {
        return Driver::query()
                    ->nearestTo($pickupLocation)
                    ->where('is_available', true)
                    ->first();
    }

}
