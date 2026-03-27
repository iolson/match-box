<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
Route::get('/matches/{match:uuid}', [MatchController::class, 'show'])->name('matches.show');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

Route::get('/players/{player}', [PlayerController::class, 'show'])->name('players.show');

Route::get('/screen/{event}', [ScreenController::class, 'show'])->name('screen.show');
