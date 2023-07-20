<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class OrderPaymentRequest extends FormRequest
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
            //
            'firstname' => 'required',
            'lastname' => 'required',            
            'mobile' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'county' => 'required',
            

        ];
    }


    public function attributes()
    {
        return [

            'firstname' => 'Ad',
            'lastname' => 'Soyad',
            'phone' => 'Telefon',
            'mobile' => 'GSM',
            'address' => 'Adres',
            'city' => 'İl',
            'county' => 'İlçe'         

        ];
    }
}
