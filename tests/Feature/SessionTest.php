<?php

use App\Models\User;

test('user can store meditation session', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/sessions', [
        'session_date' => '2026-03-26',
        'duration' => 2,
        'notes' => 'Test session'
    ]);

    $response->assertStatus(302);

    $this->assertDatabaseHas('meditation_sessions', [
        'notes' => 'Test session'
    ]);
});