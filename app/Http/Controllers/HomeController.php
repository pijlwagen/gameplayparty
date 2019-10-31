<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $times = collect(DB::select(DB::raw("SELECT z.`3d`, z.atmos, z.dolby, z.ultra, t.price AS price, t.id AS id, z.name as zaal, b.name as bios, b.slug as biosID, t.start as 'start', t.end as 'end' FROM bioscopen b INNER JOIN zalen z on z.bioscoop_id = b.id INNER JOIN timelocks t on t.zaal_id = z.id AND t.available = 1 AND t.start > NOW() ORDER BY t.start ASC LIMIT 3")));
        return view('welcome', [
            'page' => Page::where('url', 'home')->first(),
            'times' => $times,
        ]);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        Mail::to('info@gameplayparty.nl')->send(new Contact($request));

        session()->flash('success', 'Wij zullen zo spoedig mogelijk contact met u opnemen.');
        return redirect('/contact');
    }
}
