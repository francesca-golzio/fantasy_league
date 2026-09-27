<?php

namespace App\Http\Controllers\Admin\Characters;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();

        return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newCharacter = new Character();
        $newCharacter->name = $data['name'];
        $newCharacter->surname = $data['surname'];
        $newCharacter->cost = $data['cost'];
        $newCharacter->description = $data['description'];

        if (array_key_exists('img_profile', $data)) {
            $img_url = Storage::putFile('characters', $data['img_profile']);
            $newCharacter->img_profile = $img_url;
        }

        if (array_key_exists('img_full', $data)) {
            $img_url = Storage::putFile('characters', $data['img_full']);
            $newCharacter->img_full = $img_url;
        }


        $newCharacter->slug = Str::slug(Str::lower($newCharacter->name . ' ' . $newCharacter->surname), '-');

        //@dd($newCharacter);

        $newCharacter->save();

        return redirect()->route('admin.characters.show', $newCharacter);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('admin.characters.show', compact('character'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view('admin.characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $data = $request->all();

        $character->name = $data['name'];
        $character->surname = $data['surname'];
        $character->cost = $data['cost'];
        $character->description = $data['description'];

        if (array_key_exists('img_profile', $data)) {

            if ($character->img_profile) {
                Storage::delete($character->img_profile);
            }
            $img_url = Storage::putFile('characters', $data['img_profile']);
            $character->img_profile = $img_url;
        }

        if (array_key_exists('img_full', $data)) {

            if ($character->img_full) {
                Storage::delete($character->img_full);
            }
            $img_url = Storage::putFile('characters', $data['img_full']);
            $character->img_full = $img_url;
        }

        $character->slug = Str::slug(Str::lower($character->name . ' ' . $character->surname), '-');

        //@dd($character);
        $character->save();

        return redirect()->route('admin.characters.show', $character);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        if ($character->img_profile) {
            Storage::delete($character->img_profile);
        }
        if ($character->img_full) {
            Storage::delete($character->img_full);
        }
        $character->delete();

    //@dd($character);
        return redirect()->route('admin.characters.index');
    }
}
