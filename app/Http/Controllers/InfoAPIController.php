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
            ->get();

        return response()->json($events_Info);
    }
}
