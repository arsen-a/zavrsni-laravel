<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required|min:8|regex:/\w*[0-9]{1,}\w*/',
            'confirm_password' => 'required|same:password',
            'terms' => 'accepted'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'The password field is required with minimum of 8 characters and 1 number.',
            'terms.accepted' => 'You must accept terms and conditions.'
        ];
    }
}
