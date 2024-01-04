<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailRequest extends FormRequest
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
            //
            'user_id'=> ["required"],
            'address'=>['required'],
            'phone_number'=>['required', 'string', 'email'],
            'profile_picture'=>['required',"mimes:jpeg,jpg,png","max:2048'"],
        ];
    }
}
