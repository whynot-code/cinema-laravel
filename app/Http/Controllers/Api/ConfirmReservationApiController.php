<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TicketPDFController;
use App\Mail\TicketShipped;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConfirmReservationApiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation = Reservation::where('uuid', $request->uuid)->get()->first();
        $ticket = new Ticket();
        $ticket->uuid = $reservation->uuid;
        $ticket->user_id = $reservation->user_id;
        $ticket->repertoire_id = $reservation->repertoire_id;
        $ticket->seats_number = $reservation->seats_number;
        
        // $ticket->save();
        
        $pdfPatch = TicketPDFController::create($ticket);
        Mail::to($reservation->user())->send(new TicketShipped($pdfPatch));


        // Reservation::where('uuid', $request->uuid)->delete();

        return response('OK', 200)
                    ->header('Ticket generated', true);
    }

}
