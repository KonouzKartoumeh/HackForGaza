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
        $dateframeInfo = DateframeInfo::all(); // Replace DateframeInfo with your actual model name

        return view('dateframe-info', ['dateframeInfo' => $dateframeInfo]);
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

    public function update(Request $request, $id)
    {
        $dateframeInfo = DateframeInfo::find($id); // Replace 'DateframeInfo' with your model name
    
        // Update Date Frame Info with data from the form
        $dateframeInfo->update([
            'year' => $request->input('year'),
            'content' => $request->input('content'),
            'summary' => $request->input('summary'),
            // Update more fields as needed
        ]);
    
        return redirect()->route('admin.dateframe-info.index')->with('success', 'Date Frame Info updated successfully');
    }

    public function destroy(DateframeInfo $dateframe_Info)
    {
        $dateframe_Info->delete();
        return response()->json(null, 204);
    }

    public function edit($id)
{
    $dateframeInfo = DateframeInfo::find($id); // Replace 'DateframeInfo' with your model name
    
    return view('dateframes_info.edit', ['dateframeInfo' => $dateframeInfo]);
}
}

