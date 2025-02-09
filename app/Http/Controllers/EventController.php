<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $eventData = $request->validate([
            'name' => 'required|string',
            'featured' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'location' => 'required',
        ]);

        Event::create($eventData);

        return redirect()->route('events.index');
    }

    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    public function update(Request $request, Event $event)
    {
        $eventData = $request->validate([
            'name' => 'nullable|string',
            'featured' => 'nullable|string',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i:s',
            'location' => 'nullable',
        ]);

        $event->update($eventData);

        return response()->json($event, 200);
    }

    public function delete(Event $event)
    {
        $event->delete();

        return response()->json(['success'=>true], 200);
    }
}
