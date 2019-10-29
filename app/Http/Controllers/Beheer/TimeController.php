<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Room;
use App\Models\Timelock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TimeController extends Controller
{
    public function create(Request $request)
    {
        $zaal = Room::find($request->zaalId);
        if (!$zaal) return abort(404);
        return view('beheer.time.create', [
            'zaal' => $zaal
        ]);
    }

    public function store(Request $request)
    {
        $zaal = Room::find($request->zaalId);
        if (!$zaal) return abort(404);

        $request->validate([
            'date' => 'required|date',
            'end' => 'required',
            'start' => 'required',
            'price' => 'required|numeric'
        ]);

        $start = $request->input('start');
        $end = $request->input('end');
        $date = $request->input('date');

        Timelock::create([
            'start' => Carbon::parse($date . $start)->format('Y-m-d H:i:s'),
            'end' => Carbon::parse($date . $end)->format('Y-m-d H:i:s'),
            'price' => $request->input('price'),
            'zaal_id' => $zaal->id
        ]);

        session()->flash('success', 'Tijdslot voor zaal <b>' . $zaal->name . '</b> is succesvol toegevoegd.');
        return redirect(!!$request->query('add') ? url()->current() : route('zaal.edit', [$zaal->bioscoop_id, $zaal->id]));
    }

    public function edit(Request $request)
    {
        $zaal = Room::find($request->zaalId);
        $time = Timelock::find($request->tID);
        if (!$zaal || !$time) return abort(404);
        return view('beheer.time.edit', [
            'zaal' => $zaal,
            'time' => $time,
        ]);
    }

    public function update(Request $request)
    {
        $zaal = Room::find($request->zaalId);
        $time = Timelock::find($request->tID);
        if (!$zaal || !$time) return abort(404);

        $request->validate([
            'date' => 'required|date',
            'end' => 'required',
            'start' => 'required',
            'price' => 'required|numeric'
        ]);

        $start = $request->input('start');
        $end = $request->input('end');
        $date = $request->input('date');

        $time->update([
            'start' => Carbon::parse($date . $start)->format('Y-m-d H:i:s'),
            'end' => Carbon::parse($date . $end)->format('Y-m-d H:i:s'),
            'price' => $request->input('price'),
        ]);

        session()->flash('success', 'Tijdslot is succesvol aangepast.');
        return redirect(!!$request->query('add') ? route('time.create', [$zaal->bioscoop_id, $zaal->id]) : route('zaal.edit', [$zaal->bioscoop_id, $zaal->id]));
    }

    public function delete(Request $request)
    {
        $time = Timelock::find($request->tID);
        if (!$time) abort(404);
        $time->delete();
        session()->flash('success', 'Tijdslot succesvol verwijderd.');
        return redirect(route('zaal.edit', [$request->id, $request->zaalId]));
    }
}
