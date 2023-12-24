<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomStoreRequest;
use App\Http\Requests\RoomUpdateRequest;
use Illuminate\Contracts\View\View;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('rooms.index', [
            'rooms' => Room::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomStoreRequest $request): RedirectResponse
    {
        $room = new Room();

        $room->name = $request->input('name');
        $room->number = $request->input('number');
        $room->seats_number = $request->input('seats_number');

        $room->save();

        return redirect()-> route('rooms_index');
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
        $room = Room::find($id);
        return view('rooms.edit', [
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomUpdateRequest $request, string $id): RedirectResponse
    {
        $room = Room::find($id);

        $room->name = $request->input('name');
        $room->number = $request->input('number');
        $room->seats_number = $request->input('seats_number');

        $room->save();

        return redirect()->route('rooms_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $room = Room::find($id);

        $room->delete();

        return redirect()->route('rooms_index');
    }
}
