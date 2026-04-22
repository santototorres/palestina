<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'street' => 'required|string|max:255',
            'street_number' => 'required|string|max:50',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'canton' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'language' => 'nullable|string|max:10',
            'form_quantity' => 'required|integer|min:1|max:100',
            'comment' => 'nullable|string|max:1000',
            'consent_accepted' => 'required|boolean|accepted',
            'physical_process_acknowledged' => 'required|boolean|accepted',
        ];
    }
}