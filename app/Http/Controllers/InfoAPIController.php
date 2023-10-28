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
        ->distinct('event_year')
        ->latest()
        ->get();
    
    
    $eventsByYear = [];
    foreach ($events_Info as $event) {
        $year = $event->event_year;
        $events = EventInfo::where('event_year', $year)->get();
    
        $formattedEvents = $events->map(function ($event) {
            $date = Carbon::parse($event->date); 
            $formattedDate = $date->format('F d, Y'); 
            $month = $date->format('F'); 
    
            return [
                'id' => $event->id,
                'event_name' => $event->title,
                'date' => $formattedDate, 
                'month' => $month, 
                'image' => $event->image,
                'description' => $event->description,
                'is_flagged' => $event->priority_level === 1,
                'resource_links' => $event->resourceLinks,
            ];
        });
    
        $eventsByYear[] = [
            'date_year' => $year,
            'events' => $formattedEvents,
        ];
    }
    
    return response()->json($eventsByYear);
    }
    
    
}
