@foreach($events as $event)
    <div class="event">
        <h2>{{ $event->name }}</h2>
        <p>{{ $event->description }}</p>
        <p>{{ $event->date }}</p>
    </div>
@endforeach
