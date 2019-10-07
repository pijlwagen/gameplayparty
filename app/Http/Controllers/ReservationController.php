<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Bioscoop;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        $bios = Bioscoop::where('slug', $request->slug)->first();
        if (!$bios) return abort(404);
        return view('reservation', [
            'bios' => $bios
        ]);
    }
}
