<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverAssignRequest;
use App\Http\Resources\DriverResource;
use App\Services\Dispatcher;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DriverAssignController extends Controller
{
    public function __invoke(DriverAssignRequest $request, Dispatcher $dispatcher)
    {
        $driver = $dispatcher->assignToDriver($request->validated());

        return $driver
            ? new DriverResource($driver)
            : response()->json(['message' => 'No available drivers'], ResponseAlias::HTTP_NOT_FOUND);
    }
}
