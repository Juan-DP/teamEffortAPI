<?php

namespace App\Http\Requests\Charity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCharityRequest extends FormRequest
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
            'ucid' => [
                'required',
                'exists:challenges,uchid,deleted_at,NULL',
            ],
            'name' => [
                'sometimes',
                'string|min:1|max:256'
            ],
            'description' => [
                'sometimes',
            ],
            'mission_statement' => [
                'sometimes',
                'string|min:64|max:512'
            ],
            'address' => [
                'sometimes',
                'string|min:10|max:256'
            ],
            'email' => [
                'sometimes',
                'email:rfc|dns'
            ],
            'website' => [
                'sometimes',
                'website'
            ],
        ];
    }
}
