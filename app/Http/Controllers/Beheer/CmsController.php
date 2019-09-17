<?php

namespace App\Http\Controllers\Beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    public function create()
    {
        return view('beheer.cms.create');
    }
}
