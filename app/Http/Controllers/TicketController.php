<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Ticket;
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
        $reservations = Reservation::all();
        return view('tickets.create', [
            'reservations' => $reservations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $uuid)
    {
        $reservation = Reservation::where('uuid', $uuid->uuid)->get()->first();
        $ticket = new Ticket();
        $ticket->uuid = $reservation->uuid;
        $ticket->user_id = $reservation->user_id;
        $ticket->repertoire_id = $reservation->repertoire_id;
        $ticket->seats_number = $reservation->seats_number;
        

        $ticket->save();
        Reservation::where('uuid', $uuid->uuid)->delete();
        
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
