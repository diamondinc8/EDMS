<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'document_type' => 'required|string',
            'document_number' => 'nullable|integer',
            'title' => 'nullable|string',
            'date' => 'nullable|date',
            'amount' => 'numeric',
            'content' => 'nullable|string',
            'documents' => 'nullable|array',
            'recipient_company_id' => 'nullable|integer',
        ];
    }
}
