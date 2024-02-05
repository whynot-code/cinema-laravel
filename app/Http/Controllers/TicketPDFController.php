<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketPDFController extends Controller
{
    public static function create(Ticket $request)
    {
        $ticket = $request;
        $ticketData = 
        [
            'title' => $ticket->repertoire->movie->title,
            'date' => $ticket->repertoire->display_date,
            'time' => $ticket->repertoire->display_time,
            'room_number' => $ticket->repertoire->room->number,
            'room_name' => $ticket->repertoire->room->name,
            'seat' => $ticket->seats_number,
            'owner' => $ticket->user->name,
            'uuid' => $ticket->uuid
        ];
        Pdf::loadView('tickets.PDF.pdf', $ticketData)
                ->setPaper('a4', 'landscape')
                ->save(storage_path('mails/'.$ticket->user->name.'_'.$ticket->uuid.'.pdf'));
        return 'mails/'.$ticket->user->name.'_'.$ticket->uuid.'.pdf';
    }
}
