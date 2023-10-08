<?php

namespace App\Http\Controllers;

use App\Services\RandomPersonService;
use Illuminate\Http\JsonResponse;

class RandomPersonController extends Controller
{
    public function random(RandomPersonService $service): JsonResponse
    {
        return new JsonResponse($service->random());
    }
}
