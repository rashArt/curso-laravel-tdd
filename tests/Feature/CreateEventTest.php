<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_event_can_be_created(): void
    {
        // Arrange
        $eventData = [
            'name' => 'Laravel Meetup',
            'featured' => 'Laravel.png',
            'date' => '2025-02-09',
            'time' => '18:00:00',
            'location' => 'Lagos, Nigeria',
        ];

        // Act
        $response = $this->post('/events', $eventData);

        // Assert
        $response->assertStatus(302);
        $this->assertDatabaseHas('events', $eventData);
    }
}
