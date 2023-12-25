<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepertoireStoreRequest;
use App\Http\Requests\RepertoireUpdateRequest;
use App\Models\Movie;
use App\Models\Repertoire;
use App\Models\Room;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RepertoiresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $repertoires = Repertoire::all()->sortBy('display_time');
        $sorted_dates = Repertoire::all()
                        ->pluck('display_date')
                        ->unique()
                        ->sort();
        $rooms = Room::all();
        return view('repertoires.index', [
            'repertoires' => $repertoires,
            'sorted_dates' => $sorted_dates,
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('repertoires.create', ['movies' => Movie::all(), 'rooms' => Room::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RepertoireStoreRequest $request): RedirectResponse
    {
        $repertoire = new Repertoire();

        $repertoire->room_id = $request->input('room_id');
        $repertoire->movie_id = $request->input('movie_id');
        $repertoire->display_time = $request->input('display_time');
        $repertoire->display_date = $request->input('display_date');

        $repertoire->save();

        return redirect()->route('repertoires_index');
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
    public function edit(string $id): View
    {
        $repertoire = Repertoire::find($id);
        $rooms = Room::all();
        $movies = Movie::all();

        return view('repertoires.edit', [
            'repertoire' => $repertoire,
            'rooms' => $rooms,
            'movies' => $movies
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RepertoireUpdateRequest $request, string $id): RedirectResponse
    {
        $repertoire = Repertoire::find($id);

        $repertoire->room_id = $request->input('room_id');
        $repertoire->movie_id = $request->input('movie_id');
        $repertoire->display_datetime = $request->input('display_datetime');

        $repertoire->save();

        return redirect()->route('repertoires_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $repertoire = Repertoire::find($id);

        $repertoire->delete();

        return redirect()->route('repertoires_index');
    }
}
