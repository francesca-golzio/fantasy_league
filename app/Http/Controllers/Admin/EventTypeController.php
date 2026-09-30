<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = EventType::all();

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newEvent = new EventType();

        $newEvent->name = $data['name'];
        $newEvent->base_points = $data['base_points'];
        $newEvent->type = $data['type'];

        //dd($newEvent);

        $newEvent->save();

        return redirect()->route('admin.events.show', $newEvent);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventType $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventType $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventType $event)
    {
        $data = $request->all();

        $event->name = $data['name'];
        $event->base_points = $data['base_points'];
        $event->type = $data['type'];

        //dd($event);

        $event->update();

        return redirect()->route('admin.events.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventType $event)
    {
        $event->delete();

        //dd($event);
        return redirect()->route('admin.events.index');
    }
}
