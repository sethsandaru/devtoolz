<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class RandomIdsController extends Controller
{
    public function random(): JsonResponse
    {
        $uuid = Str::uuid()->toString();
        $uuidV4 = Str::orderedUuid()->toString();

        return new JsonResponse([
            'uuid' => $uuid,
            'uuidV4' => $uuidV4,
        ]);
    }
}
