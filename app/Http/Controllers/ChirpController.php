<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChirpRequest;
use App\Http\Requests\UpdateChirpRequest;
use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $chirps = Chirp::with('user')
            ->latest()
            ->paginate(15);

        return view('chirps.index', [
            'chirps' => $chirps,
        ]);
    }

    /**
     * Display the authenticated user's chirps.
     */
    public function myChirps(): View
    {
        $chirps = Chirp::with('user')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(15);

        return view('chirps.my-chirps', [
            'chirps' => $chirps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Authorization handled by auth middleware, but double-check
        $this->authorize('create', Chirp::class);
        
        return view('chirps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChirpRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $chirp = Chirp::create([
            'message' => $validated['message'],
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('chirps.index')
            ->with('success', 'Chirp created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp): View
    {
        $chirp->load('user');

        return view('chirps.show', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        $this->authorize('update', $chirp);
        
        $validated = $request->validated();

        $chirp->update([
            'message' => $validated['message'],
        ]);

        return redirect()
            ->route('chirps.index')
            ->with('success', 'Chirp updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect()
            ->route('chirps.index')
            ->with('success', 'Chirp deleted successfully!');
    }
}
