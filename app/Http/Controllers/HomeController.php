<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'page' => Page::where('url', 'home')->first()
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
