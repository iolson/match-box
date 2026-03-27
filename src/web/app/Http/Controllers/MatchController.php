<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use Illuminate\View\View;

class MatchController extends Controller
{
    public function index(): View
    {
        return view('matches.index');
    }

    public function show(GameMatch $match): View
    {
        return view('matches.show', compact('match'));
    }
}
