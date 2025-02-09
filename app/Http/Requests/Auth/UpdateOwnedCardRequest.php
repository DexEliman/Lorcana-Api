<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnedCardRequest extends FormRequest
{
    public function rules()
    {
        return [
            'owned' => 'required|boolean',
        ];
    }
}
