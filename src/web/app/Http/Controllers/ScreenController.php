<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;

class ScreenController extends Controller
{
    public function show(Event $event): View
    {
        return view('screen.show', compact('event'));
    }
}
