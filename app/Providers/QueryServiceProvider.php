<?php

namespace App\Providers;

use App\Models\Queries\LocationExpressionBuilder;
use App\Models\Queries\MysqlLocationExpressionBuilder;
use Illuminate\Support\ServiceProvider;

class QueryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LocationExpressionBuilder::class, MysqlLocationExpressionBuilder::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
