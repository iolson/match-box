<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\JsonResponse;

class ScreenApiController extends Controller
{
    public function show(Event $event): JsonResponse
    {
        return response()->json($event->load('matches'));
    }
}
