<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        return view('teams.index');
    }

    public function show(Team $team): View
    {
        return view('teams.show', compact('team'));
    }
}
