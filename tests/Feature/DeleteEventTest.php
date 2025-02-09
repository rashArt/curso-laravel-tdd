<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;

class DeleteEventTest extends TestCase
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

    public function test_an_event_can_be_deleted(): void
    {
        // act
        $response = $this->delete('/events/'.$this->event->id);

        // Assert
        $this->assertDatabaseMissing('events', ['name' => $this->event->name]);
        $response->assertStatus(200);
    }
}
