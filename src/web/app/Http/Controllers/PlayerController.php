<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\View\View;

class PlayerController extends Controller
{
    public function show(Player $player): View
    {
        return view('players.show', compact('player'));
    }
}
