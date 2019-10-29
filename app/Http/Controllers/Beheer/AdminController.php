<?php

namespace App\Http\Controllers\Beheer;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Reservation;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $previous = [
            'pre' => Payment::whereMonth('created_at', Carbon::now()->subMonth()->month)->get(),
            'reservations' => Reservation::whereMonth('created_at', Carbon::now()->subMonth()->month)->get(),
            'total' => Reservation::whereMonth('created_at', Carbon::now()->subMonth()->month)->get()->map(function ($r) {
                return $total = $r->total() / 100 * 121;
            })->sum()
        ];
        $current = [
            'pre' => Payment::whereMonth('created_at', Carbon::now()->month)->get(),
            'reservations' => Reservation::whereMonth('created_at', Carbon::now()->month)->get(),
            'total' => Reservation::whereMonth('created_at', Carbon::now()->month)->get()->map(function ($r) {
                return $total = $r->total() / 100 * 121;
            })->sum()
        ];
        return view('beheer.index', [
            'previous' => $previous,
            'current' => $current
        ]);
    }
}
