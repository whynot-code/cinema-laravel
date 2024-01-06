<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Models\Repertoire;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tickets = Ticket::all();
        return view('tickets.index', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::all();
        $repertoires = Repertoire::all();
        $rooms = Room::all();
        //Jak zaimplementować nasłuchiwanie na inpucie?????!!!!!!
        return view('tickets.create', [
            'users' => $users,
            'repertoires' => $repertoires,
            'rooms' => $rooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketStoreRequest $request): RedirectResponse
    {
        $ticket = new Ticket();
        $ticket->uuid = $request->input('uuid');
        $ticket->user_id = $request->input('user_id');
        $ticket->repertoire_id = $request->input('repertoire_id');
        $ticket->seats_number = $request->input('seats_number');

        $ticket->save();
        
        return redirect()->route('tickets_index');
    }


    /**
     * Show the form for editing a new resource.
     */
    public function edit(string $id): View
    {
        $ticket = Ticket::where('uuid', $id)->get()->first();
        $users = User::all();
        $repertoires = Repertoire::all();
        $rooms = Room::all();
        return view('tickets.edit', [
            'ticket' => $ticket,
            'rooms' => $rooms,
            'users' => $users,
            'repertoires' => $repertoires 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketUpdateRequest $request, string $id): RedirectResponse
    {
        $ticket = Ticket::where('uuid', $id)
                                    ->update([
                                        'uuid' => $request->input('uuid'),
                                        'user_id' => $request->input('user_id'),
                                        'repertoire_id' => $request->input('repertoire_id'),
                                        'seats_number' => $request->input('seats_number')
                                    ]);

        return redirect()->route('tickets_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $ticket = Ticket::where('uuid', $id);

        $ticket->delete();

        return redirect()->route('tickets_index');
    }
}
