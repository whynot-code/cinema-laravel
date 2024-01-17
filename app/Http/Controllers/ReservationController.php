<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Http\Requests\ReservationUpdateRequest;
use Illuminate\Contracts\View\View;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Repertoire;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reservations = Reservation::all();
        return view('reservations.index', ['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $repertoires = Repertoire::all();
        $rooms = Room::all();
        //Jak zaimplementować nasłuchiwanie na inpucie?????!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        return view('reservations.create', [
            'users' => $users,
            'repertoires' => $repertoires,
            'rooms' => $rooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request): RedirectResponse
    {
        $reservation = new Reservation();

        $reservation->uuid = Str::random(16);
        $reservation->user_id = $request->input('user_id');
        $reservation->repertoire_id = $request->input('repertoire_id');
        $reservation->seats_number = $request->input('seats_number');

        $reservation->save();

        return redirect()->route('reservations_index');
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
        $reservation = Reservation::where('uuid', $id)->get()->first();
        $users = User::all();
        $repertoires = Repertoire::all();
        $rooms = Room::all();
        return view('reservations.edit', [
            'reservation' => $reservation,
            'rooms' => $rooms,
            'users' => $users,
            'repertoires' => $repertoires 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationUpdateRequest $request, string $id): RedirectResponse
    {
        $reservation = Reservation::where('uuid', $id)
                                    ->update([
                                        'user_id' => $request->input('user_id'),
                                        'repertoire_id' => $request->input('repertoire_id'),
                                        'seats_number' => $request->input('seats_number')
                                    ]);

        return redirect()->route('reservations_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $reservation = Reservation::where('uuid', $id);

        $reservation->delete();

        return redirect()->route('reservations_index');
    }
}
