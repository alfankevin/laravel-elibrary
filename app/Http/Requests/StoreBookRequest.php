<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'id_category' => 'required|integer',
            'cover' => 'required|string',
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:500',
            'quantity' => 'required|integer|max:100',
            'file' => 'required|string',
        ];
    }
}
