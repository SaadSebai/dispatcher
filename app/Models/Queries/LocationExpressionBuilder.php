<?php

namespace App\Models\Queries;

interface LocationExpressionBuilder
{
    public static function getSelectNearestExpression(): string;
}
