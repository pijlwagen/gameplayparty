<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class Editor
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            session()->flash('danger', 'U moet ingelogd zijn als redacteur om deze actie uit te voeren.');
            return redirect("/");
        } else if (!Auth::user()->roles()->where('name', 'Beheerder')->first() && !Auth::user()->roles()->where('name', 'Redacteur')->first()) {
            session()->flash('danger', 'U moet een redacteur zijn om deze actie uit te voeren.');
            return redirect("/");
        }
        return $next($request);
    }
}
