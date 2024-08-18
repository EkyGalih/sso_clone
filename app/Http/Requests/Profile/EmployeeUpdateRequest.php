<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
            'nip' => ['nullable', 'numeric'],
            'golongan' => ['nullable', 'max:255'],
            'status_kepegawaian' => ['required', 'max:255'],
            'pangkat' => ['nullable', 'max:255'],
            'jabatan' => ['nullable', 'max:255'],
            'unit_kerja' => ['nullable', 'max:255'],
        ];
    }
}
