<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Bioscoop;
use App\Models\BioscoopPhoto;
use App\Models\Editor;
use App\Models\Page;
use App\Models\Role;
use App\Models\Room;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ZaalController extends Controller
{
    public function view(Request $request)
    {
        $bios = Bioscoop::where('slug', $request->slug)->first();
        if (!$bios) return abort(404);
        return view("bioscoop", [
            'bios' => $bios
        ]);
    }

    /**
     * This will show the creation view
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */

    public function create(Request $request)
    {
        $bios = Bioscoop::find($request->id);
        if (!$bios) return abort(404);
        return view('beheer.zaal.create', [
            'bios' => $bios
        ]);
    }

    /**
     * This will store the room, if the request is valid and a parent exists.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */

    public function store(Request $request)
    {
        $bios = Bioscoop::find($request->id); //Find parent
        if (!$bios) return abort(404);

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'seats' => 'required|numeric|min:0',
            'handi-seats' => 'required|numeric|min:0',
            'dolby' => 'required',
        ]);

        $room = Room::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'seats' => $request->input('seats'),
            'handicapped_seats' => $request->input('handi-seats'),
            'dolby' => $request->input('dolby'),
            'atmos' => $request->input('atmos') === 'on',
            '3d' => $request->input('3d') === 'on',
            'ultra' => $request->input('ultra') === 'on',
            'bioscoop_id' => $bios->id,
        ]);

        session()->flash('success', 'Zaal <b>' . $room->name . '</b> succesvol aangemaakt.');
        return redirect(route('bios.edit', $bios));
    }

    public function edit(Request $request)
    {
        $bios = Bioscoop::find($request->id);
        $zaal = Room::find($request->zaalId);
        if (!$bios || !$zaal) return abort(404);
        return view('beheer.zaal.edit', [
            'bios' => $bios,
            'zaal' => $zaal,
            'times' => $zaal->tijden()
        ]);
    }

    public function update(Request $request)
    {
        $bios = Bioscoop::find($request->id);
        $zaal = Room::find($request->zaalId);
        if (!$bios || !$zaal) return abort(404);
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'seats' => 'required|numeric|min:0',
            'handi-seats' => 'required|numeric|min:0',
            'dolby' => 'required',
        ]);

        $zaal->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'seats' => $request->input('seats'),
            'handicapped_seats' => $request->input('handi-seats'),
            'dolby' => $request->input('dolby'),
            'atmos' => $request->input('atmos') === 'on',
            '3d' => $request->input('3d') === 'on',
            'ultra' => $request->input('ultra') === 'on',
            'bioscoop_id' => $bios->id,
        ]);

        session()->flash('success', 'Zaal <b>' . $zaal->name . '</b> is succesvol aangepast.');
        return redirect(route('bios.edit', $bios));
    }

    public function delete(Request $request)
    {
        $zaal = Room::find($request->zaalId);
        if (!$zaal) return abort(404);
        session()->flash('success', 'Zaal <b>' . $zaal->name . '</b> is succesvol verwijderd.');
        $zaal->delete();
        return redirect(route('bios.edit', $zaal->bioscoop_id));
    }
}
