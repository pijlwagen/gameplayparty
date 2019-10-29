<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Timelock;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        Payment::create([
            'paymentID' => $request->input('paymentID'),
            'payerID' => $request->input('payerID'),
            'reservation_id' => $request->input('reservationID'),
            'amount' => $request->input('amount'),
        ]);
        $reservation = Reservation::find($request->input('reservationID'));
        if ($reservation) {
            $reservation->timelock()->first()->update([
                'available' => false
            ]);
        }
    }
}
