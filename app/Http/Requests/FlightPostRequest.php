<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'isbn' => 'required|string|size:13',
            'image_path' => 'required|image',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category' => 'required',
            'pages' => 'integer|required',
            'subjects' => 'required',
            'desc'=> 'required|string|min:50',
            'publish_date' => 'date|before:now'
            //
        ];
    }
}
