<?php

namespace App\Http\Controllers\Admin\Characters;

use App\Http\Controllers\Controller;
use App\Models\Ability;
use App\Models\Character;
use App\Models\EventType;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abilities = Ability::all();

        return view('admin.abilities.index', compact('abilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = EventType::all();
        $characters = Character::all();

        return view('admin.abilities.create', compact('events', 'characters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newAbility = new Ability();
        $newAbility->character_id = $data['character_id'];
        $newAbility->event_type_id = $data['event_type_id'];
        $newAbility->kind = $data['kind'];
        $newAbility->factor = $data['factor'];

        //dd($newAbility);
        $newAbility->save();

        return redirect()->route('admin.abilities.show', $newAbility);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ability $ability)
    {
        return view('admin.abilities.show', compact('ability'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ability $ability)
    {
        $events = EventType::all();
        $characters = Character::all();

        return view('admin.abilities.edit', compact('ability', 'events', 'characters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ability $ability)
    {
        $data = $request->all();

        $ability->character_id = $data['character_id'];
        $ability->event_type_id = $data['event_type_id'];
        $ability->kind = $data['kind'];
        $ability->factor = $data['factor'];

        $ability->save();

        return redirect()->route('admin.abilities.show', $ability);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ability $ability)
    {
        $ability->delete();

        return redirect()->route('admin.abilities.index');
    }
}
