<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CmsController extends Controller
{
    public function handle(Request $request)
    {
        $page = Page::where('url', $request->path)->first();
        if (!$page) return abort(404);
        return view("templates.{$page->view}", [
            'page' => $page
        ]);
    }

    public function index()
    {
        $pages = Page::paginate(20);
        return view('beheer.cms.index', [
            'pages' => $pages
        ]);
    }

    public function create()
    {
        $dir = File::allFiles(resource_path('views/templates'));
        $files = collect([]);
        foreach ($dir as $file) {
            $files->push(str_replace('.blade.php', '', $file->getBasename()));
        }
        return view('beheer.cms.create', [
            'files' => $files
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:256',
            'url' => 'required|max:256',
            'view' => 'required',
            'content' => 'required'
        ]);

        $page = Page::create([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'view' => $request->input('view'),
            'content' => $request->input('content'),
        ]);

        session()->flash('success', "Pagina <b>{$page->title}</b> is succesvol aangemaakt.");
        return redirect(route('cms.index'));
    }

    public function edit(Request $request)
    {
        $page = Page::find($request->id);
        if (!$page) return abort(404);
        $dir = File::allFiles(resource_path('views/templates'));
        $files = collect([]);
        foreach ($dir as $file) {
            $files->push(str_replace('.blade.php', '', $file->getBasename()));
        }

        return view('beheer.cms.edit', [
            'page' => $page,
            'files' => $files
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:256',
            'url' => 'required|max:256',
            'view' => 'required',
            'content' => 'required'
        ]);

        $page = Page::find($request->id);
        if (!$page) return abort(404);

        $page->update([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'view' => $request->input('view'),
            'content' => $request->input('content'),
        ]);

        session()->flash('success', "Pagina <b>{$page->title}</b> is succesvol aangepast.");
        return redirect(route('cms.index'));
    }
}
