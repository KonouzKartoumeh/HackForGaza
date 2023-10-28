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
        $images = [];
        foreach ($events_Info as $event) {
            $year = $event->event_year;
            $formattedEvents = $events_Info
                ->where('event_year', $year)
                ->map(function ($event) {
                    $date = Carbon::parse($event->date);
                    $formattedDate = $date->format('F d, Y');
                    $month = $date->format('F');
                    $images[] = $event->image;

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
    
            $eventsGrouped[] = [
                'id' => $yearCounter, // Assign the counter as an id
                'img' => $images,
                'date_year' => $year,
                'events' => $formattedEvents->unique('id')->values()->all(),
            ];
    
            $yearCounter++; // Increment the year counter
        }
    
        // Make sure the year is unique and not repeated
        $uniqueYears = collect($eventsGrouped)->unique('date_year')->values()->all();
    
        return response()->json($uniqueYears);
    }
    
    
    
}
