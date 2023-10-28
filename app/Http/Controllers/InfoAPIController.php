<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\EventInfo;
use App\Models\ResourceLink;
use Illuminate\Http\Request;
use App\Models\DataType; // Import the DataType model

class InfoAPIController extends Controller
{
    public function index()
    {
        $events_Info = EventInfo::with('resourceLinks')
            ->select('id', 'title', 'date', 'event_year', 'image', 'description', 'priority_level')
            ->latest()
            ->get();
    
        $eventsGrouped = [];
        $yearCounter = 1; // Initialize the year counter
    
        foreach ($events_Info as $event) {
            $year = $event->event_year;
    
            if (!isset($eventsGrouped[$year])) {
                $eventsGrouped[$year] = [
                    'id' => $yearCounter, // Assign the counter as an id
                    'img' => [], // Initialize an empty array for images
                    'date_year' => $year,
                    'events' => [], // Initialize an empty array for events
                ];
                $yearCounter++; // Increment the year counter
            }
    
            $date = Carbon::parse($event->date);
            $formattedDate = $date->format('F d, Y');
            $month = $date->format('F');
            $eventsGrouped[$year]['img'][] = $event->image; // Add image to the year's images array
    
            $eventsGrouped[$year]['events'][] = [
                'id' => $event->id,
                'event_name' => $event->title,
                'date' => $formattedDate,
                'month' => $month,
                'image' => $event->image,
                'description' => $event->description,
                'is_flagged' => $event->priority_level === 1,
                'resource_links' => $event->resourceLinks,
            ];
        }
    
        // Re-index the array so that the IDs start from 1
        $eventsGrouped = array_values($eventsGrouped);
    
        return response()->json($eventsGrouped);
    }
    
    
    public function show($eventId)
{
    $event = EventInfo::with('resourceLinks')
        ->select('id', 'title', 'date', 'event_year', 'image', 'description', 'priority_level')
        ->find($eventId);

    if (!$event) {
        return response()->json(['message' => 'Event not found'], 404);
    }

    $date = Carbon::parse($event->date);
    $formattedDate = $date->format('F d, Y');
    $month = $date->format('F');

    $eventDetails = [
        'id' => $event->id,
        'event_name' => $event->title,
        'date' => $formattedDate,
        'month' => $month,
        'image' => $event->image,
        'description' => $event->description,
        'is_flagged' => $event->priority_level === 1,
        'resource_links' => $event->resourceLinks,
    ];

    return response()->json($eventDetails);
}


public function home()
{
    $events_Info = EventInfo::with('resourceLinks')
    ->select('id', 'title', 'date', 'event_year', 'image', 'priority_level')
    ->orderBy('date', 'asc')
    ->get();


$eventsGrouped = [];
$yearCounter = 1; // Initialize the year counter

foreach ($events_Info as $event) {
    $year = $event->event_year;

    if (!isset($eventsGrouped[$year])) {
        $eventsGrouped[$year] = [
            'id' => $yearCounter, // Assign the counter as an id
            'img' => [], // Initialize an empty array for images
            'date_year' => $year,
            'events' => [], // Initialize an empty array for events
        ];
        $yearCounter++; // Increment the year counter
    }

    $date = Carbon::parse($event->date);
    $formattedDate = $date->format('F d, Y');
    $month = $date->format('F');
    $eventsGrouped[$year]['img'][] = $event->image; // Add image to the year's images array

    $eventsGrouped[$year]['events'][] = [
        'id' => $event->id,
        'event_name' => $event->title,
     
        'month' => $month,
        'image' => $event->image, 
    ];
}

// Re-index the array so that the IDs start from 1
$eventsGrouped = array_values($eventsGrouped);

return response()->json($eventsGrouped);
}



}
