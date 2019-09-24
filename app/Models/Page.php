<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['title', 'content', 'url', 'view'];

    public function render()
    {
        return !!(Auth::check() && Auth::user()->isAdmin()) ? "{$this->content}<br><a href='" . route('cms.edit', $this)."'>Pagina aanpassen</a>" : $this->content;
    }
}
