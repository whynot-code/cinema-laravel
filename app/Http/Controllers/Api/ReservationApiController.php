<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationApiController extends Controller
{
    public function store(RegisterApiRequest $request)
    {
        $reservation = new Reservation();

        $reservation->uuid = Str::random(16);
        $reservation->user_id = $request->input('user_id'); // W jaki sposób przekażemy id?
        $reservation->repertoire_id = $request->input('repertoire_id');
        $reservation->seats_number = $request->input('seats_number');

        $reservation->save();

        return redirect()->route('reservations_index');
    }

    
}
