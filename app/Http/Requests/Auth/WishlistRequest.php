<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class WishlistRequest extends FormRequest
{
    public function rules()
    {
        return [
            'card_id' => 'required|exists:cards,id',
        ];
    }
}
