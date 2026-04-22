<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'city' => 'nullable|string|max:255',
            'items' => 'required|array|min:1',
            'items.*.product_reference' => 'required|string|max:100',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.size' => 'nullable|string|max:20',
            'items.*.language_variant' => 'nullable|string|max:10',
        ];
    }
}