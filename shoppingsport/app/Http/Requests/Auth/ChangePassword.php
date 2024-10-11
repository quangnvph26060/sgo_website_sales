<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangePassword extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'old_password' => 'required|min:6|max:20',
            'new_password' => 'required|min:6|max:20',
            'new_password_confirmation' => 'required|min:6|max:20|same:new_password',
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => 'Mật khẩu cũ',
            'new_password_confirmation' => 'Mật khẩu',
            'new_password' => 'Mật mật khẩu mới',
        ];
    }

    public function messages()
    {
        return __('request.messages');
    }

    public function failedValidation($validator)
    {

        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]));
    }
}
