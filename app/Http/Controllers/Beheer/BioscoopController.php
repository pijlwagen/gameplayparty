<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Bioscoop;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $bios = Bioscoop::paginate(20);
        return view('beheer.bios.index', [
            'bioscopen' => $bios
        ]);
    }

    public function create()
    {
        return view('beheer.bios.create');
    }

    public function delete(Request $request)
    {
        $page = Page::find($request->id);
        if (!$page) return abort(404);
        $page->delete();
        session()->flash('success', "Pagina <b>{$page->title}</b> is succesvol verwijderd.");
        return redirect(route('cms.index'));
    }
}
