<?php

namespace App\Http\Controllers;

use App\Http\Requests\EncryptRequest;
use Illuminate\Http\JsonResponse;

class EncryptorController extends Controller
{
    public function encrypt(EncryptRequest $request): JsonResponse
    {
        $value = $request->validated('value');

        $base64 = base64_encode($value);
        $hex = bin2hex($value);
        $md5Encrypted = md5($value);
        $sha1Encrypted = sha1($value);
        $sha256Encrypted = hash('sha256', $value);
        $sha512Encrypted = hash('sha512', $value);

        return new JsonResponse([
            'base64' => $base64,
            'hex' => $hex,
            'md5' => $md5Encrypted,
            'sha1' => $sha1Encrypted,
            'sha256' => $sha256Encrypted,
            'sha512' => $sha512Encrypted,
        ]);
    }
}
