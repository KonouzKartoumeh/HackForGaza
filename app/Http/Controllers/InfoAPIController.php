<?php

namespace App\Http\Controllers;

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
        ->latest()
        ->get()
        ->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'date' => $event->date,
                'year' => $event->event_year,
                'image' => $event->image,
                'description' => $event->description,                
                'is_flagged' => $event->priority_level === 1 ? true : false,
                'resource_links' => $event->resourceLinks,
            ];
        });
    
    return response()->json($events_Info);
    }
}
