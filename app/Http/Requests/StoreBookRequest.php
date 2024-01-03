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
            'id_category' => 'required',
            'title' => 'required|string|max:50',
            'author' => 'required|string|max:25',
            'description' => 'required|string|max:500',
            'quantity' => 'required|integer',
            'file' => 'required|mimes:pdf',
            'cover' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
