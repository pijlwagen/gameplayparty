<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Bioscoop;
use App\Models\BioscoopPhoto;
use App\Models\Editor;
use App\Models\Page;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BioscoopController extends Controller
{
    public function view(Request $request)
    {
        $bios = Bioscoop::where('slug', $request->slug)->first();
        if (!$bios) return abort(404);
        $times = collect(DB::select(DB::raw("SELECT t.id AS id, z.name as zaal, b.name as bios, t.start as 'start', t.end as 'end' FROM bioscopen b INNER JOIN zalen z on z.bioscoop_id = b.id INNER JOIN timelocks t on t.zaal_id = z.id WHERE b.id = :id AND t.available = 1 AND t.start > NOW()"),
            [
                'id' => $bios->id,
            ]
        ));
        return view("bioscoop", [
            'bios' => $bios,
            'zalen' => $bios->zalen(),
            'times' => $times,
        ]);
    }

//    public function zalen(Request $request)
//    {
//        $bios = Bioscoop::where('slug', $request->slug)->first();
//        if (!$bios) return abort(404);
//        return view('zalen', [
//            'zalen' => $bios->zalen(),
//            'bios' => $bios
//        ]);
//    }

    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $bios = Bioscoop::paginate(20);
        } else {
            $bios = Auth::user()->bioscopen();
        }
        return view('beheer.bios.index', [
            'bioscopen' => $bios
        ]);
    }

    public function create()
    {
        $users = Role::where("name", "Redacteur")->first()->users();
        return view('beheer.bios.create', [
            "users" => $users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "zipcode" => "required",
            "city" => "required",
            "address" => "required",
            "content" => "required",
            "slug" => "required",
            "name" => "required",
            "photos.*" => "required|image",
            "phone" => "required",
        ]);

        $bios = Bioscoop::create([
            "slug" => $request->input("slug"),
            "zip" => $request->input("zipcode"),
            "city" => $request->input("city"),
            "address" => $request->input("address"),
            "description" => $request->input("content"),
            "name" => $request->input("name"),
            "phone" => $request->input("phone"),
        ]);

        foreach ($request->file('photos') ?? [] as $photo) {
            BioscoopPhoto::create([
                "bioscoop_id" => $bios->id,
                "file" => Storage::disk('images')->put('/', $photo)
            ]);
        }

        $users = $request->input("users");
        if ($users) {
            foreach ($users as $user) {
                Editor::create([
                    "bioscoop_id" => $bios->id,
                    "user_id" => $user,
                ]);
            }
        }

        session()->flash('success', 'Bioscoop <b>' . $bios->name . '</b> succesvol aangemaakt.');
        return redirect(route('bios.index'));
    }

    public function edit(Request $request)
    {
        $bios = Bioscoop::find($request->id);
        if (!$bios) return abort(404);
        $users = Role::where("name", "Redacteur")->first()->users();
        $zalen = $bios->zalen();
        return view('beheer.bios.edit', [
            'users' => $users,
            'bios' => $bios,
            'zalen' => $zalen
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            "zipcode" => "required",
            "city" => "required",
            "address" => "required",
            "content" => "required",
            "slug" => "required",
            "name" => "required",
            "photos.*" => "image",
            "phone" => "required",
        ]);

        $bios = Bioscoop::find($request->id);
        if (!$bios) return abort(404);

        $bios->update([
            "slug" => $request->input("slug"),
            "zip" => $request->input("zipcode"),
            "city" => $request->input("city"),
            "address" => $request->input("address"),
            "description" => $request->input("content"),
            "phone" => $request->input("phone"),
            "name" => $request->input("name"),
        ]);

        foreach ($request->input('delete') ?? [] as $deletable) {
            $path = BioscoopPhoto::find($deletable);
            Storage::disk('images')->delete($path->file);
            $path->delete();
        }

        foreach ($request->file('photos') ?? [] as $photo) {
            BioscoopPhoto::create([
                "bioscoop_id" => $bios->id,
                "file" => Storage::disk('images')->put('/', $photo)
            ]);
        }

        if (Auth::user()->isAdmin()) {
            foreach ($bios->users() as $user) {
                $user->delete();
            }

            $users = $request->input("users");
            if ($users) {
                foreach ($users as $user) {
                    Editor::create([
                        "bioscoop_id" => $bios->id,
                        "user_id" => $user,
                    ]);
                }
            }
        }

        session()->flash('success', 'Bioscoop <b>' . $bios->name . '</b> succesvol aangepast.');
        return redirect(route('bios.index'));
    }

    public function delete(Request $request)
    {
        $bios = Bioscoop::find($request->id);
        if (!$bios) return abort(404);
        foreach ($bios->users() as $relation) {
            $relation->delete(); // delete relation that connects the user to the bios
        }
        foreach ($bios->photos() as $relation) {
            $relation->delete(); // delete relation that connects the photos to the bios
        }
        $bios->delete();
        session()->flash('success', "Bioscoop <b>{$bios->name}</b> is succesvol verwijderd.");
        return redirect(route('bios.index'));
    }
}
