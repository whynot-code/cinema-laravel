<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterApiRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationApiController extends Controller
{
    public function store(RegisterApiRequest $request)
    {
        $reservation = new Reservation();

        $reservation->uuid = Str::random(16);
        $reservation->user_id = $request->input('user_id'); // W jaki sposób przekażemy id? Auth::user()->user_id?
        $reservation->repertoire_id = $request->input('repertoire_id');
        $reservation->seats_number = $request->input('seats_number');

        $reservation->save();

        return response('Działa', 200);
    }

    
}
