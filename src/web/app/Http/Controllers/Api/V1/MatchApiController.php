<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\GameMatch;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class MatchApiController extends Controller
{
    public function index(): LengthAwarePaginator
    {
        return GameMatch::paginate();
    }

    public function show(GameMatch $match): JsonResponse
    {
        return response()->json($match);
    }
}
