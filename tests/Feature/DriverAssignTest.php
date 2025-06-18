<?php

use App\Models\Driver;

it('driver found (200)', function () {
    $driver = Driver::factory()->create([
        'lat' => 34.0200,
        'lng' => -6.8400,
        'is_available' => true,
    ]);

    $response = $this->getJson('/api/drivers/assign?lat=34.0201&lng=-6.8399');

    $response->assertOk()
        ->assertJson([
            'data' => [
                'id' => $driver->id,
                'name' => $driver->name,
                'lng' => $driver->lng,
                'lat' => $driver->lat,
            ],
        ]);

    $driver->delete();
});

it('driver is available', function () {

    Driver::factory(20)->create(['is_available' => false]);

    $response = $this->getJson('/api/drivers/assign?lat=34.0201&lng=-6.8399');

    $response->assertNotFound()
        ->assertExactJson([
            'message' => 'No available drivers',
        ]);

    Driver::query()->delete();
});

it('validation fails', function () {
    $response = $this->getJson('/api/drivers/assign');

    $response->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonValidationErrors(['lat', 'lng']);
});
