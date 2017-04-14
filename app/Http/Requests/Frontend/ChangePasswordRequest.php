<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class ChangePasswordRequest extends Request
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
            'password'  => "required|min: 8|confirmed",
            'password_confirmation'  => "required|min: 8",
        ];
        
    }
}
