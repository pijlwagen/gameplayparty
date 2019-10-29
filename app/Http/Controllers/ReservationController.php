<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Bioscoop;
use App\Models\Page;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Timelock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class ReservationController extends Controller
{
    public function show(Request $request)
    {
        $bios = Bioscoop::where('slug', $request->slug)->first();
        if (!$bios) return abort(404);
        $times = collect(DB::select(DB::raw("SELECT t.price AS price, t.id AS id, z.name as zaal, b.name as bios, t.start as 'start', t.end as 'end' FROM bioscopen b INNER JOIN zalen z on z.bioscoop_id = b.id INNER JOIN timelocks t on t.zaal_id = z.id WHERE b.id = :id AND t.available = 1 AND t.start > NOW()"),
            [
                'id' => $bios->id,
            ]
        ));
        return view('reservation', [
            'bios' => $bios,
            'times' => $times
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'zip-code' => 'required',
            'city' => 'required',
            'time' => 'required',
            'kids' => 'numeric',
            'youth' => 'numeric',
            'elder' => 'numeric',
            'normal' => 'numeric',
            'special' => 'numeric',
        ]);

        $time = Timelock::find($request->input('time'));
        $bios = Bioscoop::where('slug', $request->slug)->first();
        if (!$bios) return abort(404);
        if (!$time || !$time->available) {
            session()->flash('warning', 'Deze tijd is helaas niet meer beschikbaar.');
            return redirect()->back()->withInput();
        }

        $reservation = Reservation::create([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip-code'),
            'city' => $request->input('city'),
            'kids' => $request->input('kids'),
            'normal' => $request->input('normal'),
            'youth' => $request->input('youth'),
            'elder' => $request->input('elder'),
            'special' => $request->input('special'),
            'time' => $time->id,
        ]);

        return redirect(route('bios.reservations.pay', [$bios->slug, $reservation->id]));
    }

    public function create(Request $request)
    {
        $bios = Bioscoop::where('slug', $request->slug)->first();
        $reservation = Reservation::find($request->id);
        if ($reservation->payment()) {
            session()->flash('info', 'Deze reservering is al betaald.');
            return redirect(route('bios.show', $bios->slug));
        }
        $time = $reservation->timelock()->first();
        $zaal = $reservation->zaal()->first();
        if (!$bios || !$reservation || !$time || !$zaal) return abort(404);
        return view('payment', [
            'reservation' => $reservation,
            'bios' => $bios,
            'time' => $time,
            'zaal' => $zaal,
        ]);
    }

    public function invoice(Request $request)
    {
        $payment = Payment::where('paymentID', $request->query('paymentId'))->first();
        if (!$payment) abort(404);
        return view('invoice', [
            'payment' => $payment,
            'zaal' => $payment->zaal(),
            'bios' => $payment->bioscoop(),
            'reservation' => $payment->reservation(),
            'time' => $payment->timelock(),
        ]);
    }
}
