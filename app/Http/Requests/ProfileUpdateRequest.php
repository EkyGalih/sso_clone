<?php

namespace App\Http\Requests;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'number_phone' => ['nullable', 'numeric', 'max_digits:13'],
            'number_whatsapp' => ['nullable', 'numeric', 'max_digits::13'],
            'email_recovery' => ['nullable', 'email', 'max:255', Rule::unique(Profile::class)->ignore($this->user()->id, 'user_id')],
        ];
    }
}
