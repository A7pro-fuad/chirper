<?php

namespace App\Http\Controllers;

use App\Actions\CreateChirp;
use App\Actions\DeleteChirp;
use App\Actions\UpdateChirp;
use App\Data\ChirpData;
use App\Http\Requests\ChirpRequest;
use App\Http\Requests\CreateChirpRequest;
use App\Http\Requests\DeleteChirpRequest;
use App\Http\Requests\UpdateChirpRequest;
use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(ChirpRequest $request): RedirectResponse
    // {
    //     $validated = $request->validated();
    //     $request->user()->chirps()->create($validated);

    //     return redirect(route('chirps.index'));
    // }
    public function store(CreateChirpRequest $request, ChirpData $chirpData, CreateChirp $action): RedirectResponse
    {
        $action->handle($request->user(), $chirpData);
        return to_route('chirps.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View
    {
        Gate::authorize('update', $chirp);
        return view('chirps.edit', [
            'chirp' => $chirp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(ChirpRequest $request, Chirp $chirp): RedirectResponse
    // {
    //     Gate::authorize('update', $chirp);
    //     $validated = $request->validated();

    //     $chirp->update($validated);
    //     return redirect(route('chirps.index'));
    // } 
    public function update(UpdateChirpRequest $request, Chirp $chirp, UpdateChirp $action): RedirectResponse
    {
        $action->handle($request->user(), $chirp, $request->validated());
        return to_route('chirps.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Chirp $chirp): RedirectResponse
    // {
    //     Gate::authorize('delete', $chirp);

    //     $chirp->delete();
    //     return redirect(route('chirps.index'));
    // }
    public function destroy(DeleteChirpRequest $request, Chirp $chirp, DeleteChirp $action): RedirectResponse
    {
        $action->handle($request->user(), $chirp);
        return to_route('chirps.index');
    }
}
