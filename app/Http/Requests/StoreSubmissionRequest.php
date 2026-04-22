<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
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
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'canton' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'language' => 'nullable|string|max:10',
            'document_type' => 'required|string|in:signed_form_scan,signed_form_photo,shipping_proof,support_document,other',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240', // 10MB
            'consent_accepted' => 'required|boolean|accepted',
            'physical_process_acknowledged' => 'required|boolean|accepted',
        ];
    }
}