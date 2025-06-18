<?php

namespace App\Models;

use App\Models\Queries\LocationExpressionBuilder;
use App\ValueObjects\Location;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_available',
        'lng',
        'lat',
    ];

    protected $appends = [
        'location',
    ];

    protected function location(): Attribute
    {
        return Attribute::make(
            get: fn() => new Location($this->lng, $this->lat),
        );
    }

    #[Scope]
    protected function nearestTo(Builder $query, Location $location): Builder
    {
        $select = app(LocationExpressionBuilder::class)::getSelectNearestExpression();

        return $query->selectRaw($select, [$location->getLat(), $location->getLng(), $location->getLat()])
                    ->where('is_available', true)
                    ->orderBy('distance');
    }
}
