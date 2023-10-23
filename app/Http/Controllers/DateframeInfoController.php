<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DateframeInfo;
use App\Models\ResourceLink;
use Illuminate\Http\Request;
use App\Models\DataType; // Import the DataType model

class DateframeInfoController extends Controller
{
    public function index()
    {
        $r= ResourceLink::all();
        $dateframes_Info = DateframeInfo::with('resourceLinks') // Eager load the related resource links
            ->latest()
            ->get();
            
        // Transform the data to include resource link content
        
    
        return response()->json($dateframes_Info);
    }

    public function create()
    {
        $dataTypes = DataType::all(); // You can add orderBy if needed

        return view('dateframes_Info.create', ['dataTypes' => $dataTypes]);
    }

    public function store(Request $request)
    {
  //   dd($request);
        // Validation and dateframe_Info creation logic
        $dateframe_Info = DateframeInfo::create([
            'content' => $request->input('content'),
            'year' => $request->input('year'),
            'metadata'  => $request->input('year'),
            'summary'  => $request->input('summary'),
            
        ]);
    
        // Store resource links with data type
        $resourceLinksData = $request->input('resource_link');
        $dataTypes = $request->input('data_type_id');
        $resourceLinks = [];
    
        if (!empty($resourceLinksData)) {
            foreach ($resourceLinksData as $key => $link) {
                if (!empty($link)) {
                    $dataTypeId = $dataTypes[$key] ?? null;
                    $resourceLinks[] = new ResourceLink([
                        'url' => $link,
                        'data_type_id' => $dataTypeId,
                    ]);
                }
            }
        }
    
        $dateframe_Info->resourceLinks()->saveMany($resourceLinks);
    
        $notification = [
            'message' => 'Time frame created successfully.',
            'alert' => 'success',
        ];
    
        return back()->with('notification', $notification);
    }
    
    public function show(DateframeInfo $dateframe_Info)
    {
        return response()->json([
            'year' => $dateframe_Info->year,
            'content' => $dateframe_Info->content,
            'resource_link' => $dateframe_Info->resource_link,
        ]);
    }

    public function update(Request $request, DateframeInfo $dateframe_Info)
    {
        $dateframe_Info->update($request->all());
        return response()->json($dateframe_Info, 200);
    }

    public function destroy(DateframeInfo $dateframe_Info)
    {
        $dateframe_Info->delete();
        return response()->json(null, 204);
    }
}

