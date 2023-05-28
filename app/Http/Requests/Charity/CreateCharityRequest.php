<?php

namespace App\Http\Requests\Charity;

use Illuminate\Foundation\Http\FormRequest;

class CreateCharityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();
        return $user->user_type == config('user.user_types.admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string|min:1|max:256'
            ],
            'description' => [
                'required',
            ],
            'mission_statement' => [
                'required',
            ],
            'address' => [
                'required',
                'string|min:10|max:256'
            ],
            'email' => [
                'required',
                'email:rfc|dns'
            ],
            'website' => [
                'required',
                'website'
            ],
        ];
    }
}
