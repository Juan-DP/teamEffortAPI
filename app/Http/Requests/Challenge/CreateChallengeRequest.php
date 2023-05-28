<?php

namespace App\Http\Requests\Challenge;

use Illuminate\Foundation\Http\FormRequest;

class CreateChallengeRequest extends FormRequest
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
            'ucid' => [
                'ucid',
                'exists:charities,ucid,deleted_at,NULL'
            ],
            'ending_at' => [
                'numeric',
                'exists:challenge_time_frames,days,deleted_at,NULL'
            ],
        ];
    }
}
