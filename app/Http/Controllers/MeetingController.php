<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting; 
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all meetings and return as JSON
        $meetings = Meeting::all();
        return view('meetings.index', ['meetings' => $meetings]);
    }

    public function apiIndexRaw()
    {
        // Get all meetings and return as JSON
        $meetings = Meeting::all();
        return response()->json($meetings);
    }

    public function apiIndex()
    {
        $meetings = Meeting::all();
        return MeetingResource::collection($meetings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meetings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|unique:meetings|max:255',
            'description' => 'required',
            'meeting_date' => 'required|date',
        ]);

        // Create a new meeting
        Meeting::create([
            'title' => $request->title,
            'description' => $request->description,
            'meeting_date' => $request->meeting_date,
        ]);

        // Redirect to the meetings index with a success message
        return redirect()->route('meetings.index')->with('success', 'Meeting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('meetings.edit', compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the existing meeting
    $meeting = Meeting::findOrFail($id);

    // Validate the request data
    $request->validate([
        'title' => ['required', 'max:255', Rule::unique('meetings')->ignore($meeting->id)],
        'description' => 'required',
        'meeting_date' => 'required|date',
    ]);

    // Update the meeting with new data
    $meeting->update([
        'title' => $request->title,
        'description' => $request->description,
        'meeting_date' => $request->meeting_date,
    ]);

    // Redirect with a success message
    return redirect()->route('meetings.index')->with('success', 'Meeting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $meeting = Meeting::findOrFail($id);

    // Delete the meeting
    $meeting->delete();

    // Redirect to the meetings index with a success message
    return redirect()->route('meetings.index')->with('success', 'Meeting deleted successfully.');
    }
}
