<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterUserRequest extends FormRequest
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
        $rules = [
            'name'              => 'required|min:5|max:20',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6|max:20',
        ];

        if(request()->has('password')) {
            $rules['re_password'] = 'required|same:password';
        }


        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            're_password' => 'Nhập lại mật khẩu'
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
