<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;

class UpdateEventTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->event = Event::create([
            'name' => 'Laravel Event',
            'featured' => 'Laravel.png',
            'date' => Carbon::now()->format('Y-m-d'),
            'time' => Carbon::now()->format('H:i:s'),
            'location' => 'Lagos, Nigeria',
        ]);
    }

    public function test_an_event_can_be_updated(): void
    {
        $updatedData = [
            'name' => 'Laravel Event Updated',
        ];

        // Act
        $response = $this->put('/events/'.$this->event->id , $updatedData);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('events', $updatedData);
    }
}
