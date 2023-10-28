<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventInfo;
use App\Models\ResourceLink;
use Illuminate\Http\Request;
use App\Models\DataType; // Import the DataType model

class EventInfoController extends Controller
{
    public function index()
    {
        $eventInfo = EventInfo::all(); // Replace EventInfo with your actual model name

        return view('event-info', ['eventInfo' => $eventInfo]);
    }

    public function create()
    {
        $dataTypes = DataType::all(); // You can add orderBy if needed

        return view('events_Info.create', ['dataTypes' => $dataTypes]);
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
            // Add more validation rules as needed
        ]);
        
        // Validation and event_Info creation logic

        // Handle image upload
        $imagePath = null; // Initialize the image path

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension(); // Generate a unique name for the image
            $imagePath = 'images/' . $imageName; // Store the image path without the 'public' part
            $image->move(public_path('images'), $imageName); // Store the image in the 'public/images' directory
        }    
    
        // Store resource links with data type
        $resourceLinksData = $request->input('resource_link');
        $dataTypes = $request->input('data_type_id');
        $event_Info = EventInfo::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'event_year'=> date('Y', strtotime($request->input('date'))),
            'description'  => $request->input('description'),
            'image' => $imagePath, // Store the image path without the 'public' part
        ]);
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
    
        $event_Info->resourceLinks()->saveMany($resourceLinks);
    
        $notification = [
            'message' => 'Time frame created successfully.',
            'alert' => 'success',
        ];
    
        return back()->with('notification', $notification);
    }
    
    public function show(EventInfo $event_Info)
    {
        return response()->json([
            'date' => $event_Info->date,
            'title' => $event_Info->title,
            'resource_link' => $event_Info->resource_link,
        ]);
    }

    public function update(Request $request, $id)
    {
        $eventInfo = EventInfo::find($id); // Replace 'EventInfo' with your model name
    
        // Update Date Frame Info with data from the form
        $eventInfo->update([
            'date' => $request->input('date'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            // Update more fields as needed
        ]);
    
        return redirect()->route('admin.event-info.index')->with('success', 'Date Frame Info updated successfully');
    }

    public function destroy(EventInfo $event_Info)
    {
        $event_Info->delete();
        return response()->json(null, 204);
    }

    public function edit($id)
{
    $eventInfo = EventInfo::find($id); // Replace 'EventInfo' with your model name
    
    return view('events_info.edit', ['eventInfo' => $eventInfo]);
}
}

