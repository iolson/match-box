<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogReceiverController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'auth_key'   => ['required', 'string'],
            'event_type' => ['required', 'string'],
        ]);

        return response()->json(['status' => 'ok']);
    }
}
