<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EncryptRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => 'required|string',
        ];
    }
}
