<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;

class ReadEventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_can_display_list_of_events(): void
    {
        // Arrange
        Event::Create([
            'name' => 'Laravel Meetup 2',
            'featured' => 'Laravel.png',
            'date' => '2025-02-09',
            'time' => '18:00:00',
            'location' => 'Lagos, Nigeria',
        ]);

        // act
        $response = $this->get('/events');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Laravel Meetup 2');
    }
}
