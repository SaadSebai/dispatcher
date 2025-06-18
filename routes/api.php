<?php

use App\Http\Controllers\DriverAssignController;
use Illuminate\Support\Facades\Route;

Route::get('/drivers/assign', DriverAssignController::class);
