<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Participant;

class VerifyParticipantRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
			'user_code' => ['required', 'min:5', 'max:15'],
        ];
    }
}
