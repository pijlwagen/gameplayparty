<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Bioscoop;
use App\Models\Editor;
use App\Models\Page;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BioscoopController extends Controller
{
    public function view(Request $request)
    {
        $bios = Page::where('slug', $request->slug)->first();
        if (!$bios) return abort(404);
        return view("bioscoop", [
            'bios' => $bios
        ]);
    }

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
        ]);

        $bios = Bioscoop::create([
            "slug" => $request->input("slug"),
            "zip" => $request->input("zipcode"),
            "city" => $request->input("city"),
            "address" => $request->input("address"),
            "description" => $request->input("content"),
            "name" => $request->input("name"),
        ]);

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
        return view('beheer.bios.edit', [
            'users' => $users,
            'bios' => $bios,
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
        ]);

        $bios = Bioscoop::find($request->id);
        if (!$bios) return abort(404);

        foreach ($bios->users() as $user) {
            $user->delete();
        }

        $bios->update([
            "slug" => $request->input("slug"),
            "zip" => $request->input("zipcode"),
            "city" => $request->input("city"),
            "address" => $request->input("address"),
            "description" => $request->input("content"),
            "name" => $request->input("name"),
        ]);

        $users = $request->input("users");
        if ($users) {
            foreach ($users as $user) {
                Editor::create([
                    "bioscoop_id" => $bios->id,
                    "user_id" => $user,
                ]);
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
        $bios->delete();
        session()->flash('success', "Bioscoop <b>{$bios->name}</b> is succesvol verwijderd.");
        return redirect(route('bios.index'));
    }
}
