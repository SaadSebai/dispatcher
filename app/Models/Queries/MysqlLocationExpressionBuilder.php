<?php

namespace App\Models\Queries;

class MysqlLocationExpressionBuilder implements LocationExpressionBuilder
{

    public static function getSelectNearestExpression(): string
    {
        return "*, (6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat)))) AS distance";
    }
}
