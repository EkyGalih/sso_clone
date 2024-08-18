<?php

namespace App\Http\Requests\User;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInformationRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user->id)],
            'number_phone' => ['nullable', 'numeric', 'max_digits:13'],
            'number_whatsapp' => ['nullable', 'numeric', 'max_digits::13'],
            'email_recovery' => ['nullable', 'email', 'max:255', Rule::unique(Profile::class)->ignore($this->user->id, 'user_id')],
        ];
    }
}
