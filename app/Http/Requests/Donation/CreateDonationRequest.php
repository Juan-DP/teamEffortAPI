<?php

namespace App\Http\Requests\Donation;

use Illuminate\Foundation\Http\FormRequest;

class CreateDonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();
        return $user->user_type == config('user.user_types.client');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'utid' => [
                'required',
                'exists:teams:utid,deleted_at,NULL'
            ],
            'uchid' => [
                'required',
                'exists:challendes:uchid,deleted_at,NULL'
            ],
            'amount' => [
                'numeric',
                'max:' . config('database.max_decimal_value'),
                'min:' . config('database.min_decimal_value')
            ],
        ];
    }
}
