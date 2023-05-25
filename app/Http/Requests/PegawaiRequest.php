<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'position' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'nip' => ['required', 'max:22'],
            'status' => ['required', 'max:255'],
            'image' => ['required', 'image'],
        ];
    }
}
