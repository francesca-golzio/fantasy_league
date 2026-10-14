<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeagueRequest;
use App\Http\Requests\UpdateLeagueRequest;
use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* Check Policy */
        Gate::authorize('viewAny', League::class);

        /* Validate Filter */
        // TODO: sostituisci con: $allowedFilters = ['owned', 'member', 'all'];
        $allowedFilters = ['owned', 'all'];
        $filter = in_array($request->query('filter'), $allowedFilters, true)
        // TODO: sostituisci con: ? $request->query('filter') : 'member';
            ? $request->query('filter') : 'all';

        /* Get Leagues List */
        // TODO: Add points
        // TODO: Add members_TOTAL to results + orderBy points
        $leagues = League::query()
            ->with('owner')
            ->when($filter === 'owned', fn ($query) => $query->where('user_id', $request->user()->id))
            // ->orderBy('points', 'desc')
            ->orderBy('name')
            ->orderBy('id')
            ->paginate(6)
            ->withQueryString();
       
        /* Return View and Leagues */
        return view('leagues.index', [
            'leagues' => $leagues,
            'requestedFilter' => $filter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* Check Policy */
        Gate::authorize('create', League::class);

        /* Return View */
        return view('leagues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeagueRequest $request) : RedirectResponse
    {        
        $league = new League();
        $league->fill($request->safe()->only(['name']));
        $league->slug = $request->validated('slug');

        /* Set Owner */
        $league->user_id = $request->user()->id;

        $league->save();

        return redirect()
            ->route('leagues.show',  compact('league'))
            ->with('status', 'League created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(League $league)
    {
        Gate::authorize('view', $league);

        $league->load('owner');
        
        return view('leagues.show', compact('league'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(League $league)
    {
        Gate::authorize('update', $league);

        return view('leagues.edit', compact('league'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeagueRequest $request, League $league) : RedirectResponse
    {
        $league->fill($request->safe()->only(['name']));
        $league->slug = $request->validated('slug');
        $league->save();

        return redirect()
            ->route('leagues.show', compact('league'))
            ->with('status', 'League updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league)
    {
        Gate::authorize('delete', $league);

        $league->delete();

        return redirect()
            ->route('leagues.index')
            ->with('status', 'League deleted successfully');
    }
}
