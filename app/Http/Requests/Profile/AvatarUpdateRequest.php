<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class AvatarUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}
