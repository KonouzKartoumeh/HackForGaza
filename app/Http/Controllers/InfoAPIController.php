<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DateframeInfo;
use App\Models\ResourceLink;
use Illuminate\Http\Request;
use App\Models\DataType; // Import the DataType model

class InfoAPIController extends Controller
{
    public function index()
    {
        $r = ResourceLink::all();
        $dateframes_Info = DateframeInfo::with('resourceLinks') 
            ->latest()
            ->get();

        return response()->json($dateframes_Info);
    }
}
