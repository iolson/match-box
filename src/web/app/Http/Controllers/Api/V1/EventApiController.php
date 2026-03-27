<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class EventApiController extends Controller
{
    public function index(): LengthAwarePaginator
    {
        return Event::paginate();
    }

    public function show(Event $event): JsonResponse
    {
        return response()->json($event);
    }
}
