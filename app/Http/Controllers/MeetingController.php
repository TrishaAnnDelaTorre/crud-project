<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting; 
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MeetingController extends Controller
{
   
    public function index()
    {
     
        $meetings = Meeting::all();
        return view('meetings.index', ['meetings' => $meetings]);
    }

    public function apiIndexRaw()
    {
      
        $meetings = Meeting::all();
        return response()->json($meetings);
    }

    public function apiIndex()
    {
        $meetings = Meeting::all();
        return MeetingResource::collection($meetings);
    }

 
    public function create()
    {
        return view('meetings.create');
    }

 
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|unique:meetings|max:255',
            'description' => 'required',
            'meeting_date' => 'required|date',
        ]);

     
        Meeting::create([
            'title' => $request->title,
            'description' => $request->description,
            'meeting_date' => $request->meeting_date,
        ]);


        return redirect()->route('meetings.index')->with('success', 'Meeting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

 
    public function edit(string $id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('meetings.edit', compact('meeting'));
    }


    public function update(Request $request, string $id)
    {
       
    $meeting = Meeting::findOrFail($id);


    $request->validate([
        'title' => ['required', 'max:255', Rule::unique('meetings')->ignore($meeting->id)],
        'description' => 'required',
        'meeting_date' => 'required|date',
    ]);


    $meeting->update([
        'title' => $request->title,
        'description' => $request->description,
        'meeting_date' => $request->meeting_date,
    ]);

 
    return redirect()->route('meetings.index')->with('success', 'Meeting updated successfully.');
    }


    public function destroy(string $id)
    {
       $meeting = Meeting::findOrFail($id);


    $meeting->delete();


    return redirect()->route('meetings.index')->with('success', 'Meeting deleted successfully.');
    }
}
