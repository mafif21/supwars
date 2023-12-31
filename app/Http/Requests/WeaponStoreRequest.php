<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeaponStoreRequest extends FormRequest
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
            'kode' => ['required', 'string', 'max:20', 'unique:weapons'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'image' => ['image', 'mimes:jpg,jpeg,png,svg'],
            'video' => ['file', 'mimetypes:video/mp4,video/mpeg,video/quicktime'],
            'description' => ['required', 'string', 'max:255'],
        ];
    }
}
