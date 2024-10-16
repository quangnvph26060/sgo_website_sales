<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    //    "name" => "đạt nguyễn"
    //   "email" => "datntph36687@fpt.edu.vn"
    //   "phone" => "0964305701"
    //   "country_id" => "1"
    //   "province_id" => "92"
    //   "district_id" => "916"
    //   "ward_id" => "31117"
    //   "address" => "Trịnh Văn Bô"
    //   "note" => null
    //   "payment_method" => "cod"

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^0[35789][0-9]{8}$/',
            'province_id' => 'required|exists:sgo_city,id',
            'district_id' => 'required|exists:sgo_districts,id',
            'ward_id' => 'required|exists:sgo_wards,id',
            'address' => 'required',
            'payment_method' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'province_id' => 'Tỉnh/Thành phố',
            'district_id' => 'Quận/Huyện',
            'ward_id' => 'Phường/Xã',
            'address' => 'Địa chỉ',
            'payment_method' => 'Phương thức thanh toán',
        ];
    }

    public function messages()
    {
        return __('request.messages');
    }



    // protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){

    //     throw new HttpResponseException(response()->json([
    //         'status' => false,
    //         'message' => $validator->errors()->first()
    //     ]));

    // }
}
